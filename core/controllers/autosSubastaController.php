<?php

//Controller auto subasta

/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 19/9/18
 * Time: 19:10
 */
include("core/models/AutosSubasta.class.php");
include("core/models/AutosComprado.class.php");
include("core/models/GastosAdm.class.php");
include("core/models/Usuarios.class.php");
include("core/models/ValorCalle.class.php");
include("core/models/SubastaGastosOtros.class.php");
include("core/models/Utils.class.php");

if(isset($_SESSION['user'])){

  $template = new Smarty();
  $template->error_reporting = E_ALL & ~E_NOTICE;
  $template->setTemplateDir('./styles/templates/');
  $template->setCompileDir('./compiler');

  $objUtils = new Utils();
  $arrCombus = $objUtils->getCombustibles();

  $objAutosSubasta = new AutosSubasta();
  $arrayAutos = $objAutosSubasta->getDatosAutos();

  /*
  echo "<pre>";
  print_r($arrayAutos);
  echo "</pre>";*/


  $objUsuarios = new Usuarios();
  $arrayUsuarios = $objUsuarios->getUsuarios();

  $objGastosAdm = new GastosAdm();

  //Otros gastos subastas autos
  $objOtrosGastosSubastas = new SubastaGastosOtros();

  $iva = 21;
  $gastosMasIva = 0;
  foreach($arrayAutos as $idAuto => $datosAutos){

    //Otros gastos autos subasta ,  no comprados
    $sumOtrosGastos = 0;
    $arrayOtrosGastosSubastas = $objOtrosGastosSubastas-> getOtrosGastosSubasta($idAuto);
    if(count($arrayOtrosGastosSubastas)>0){
        //$arrayAutos[$idAuto]["otrosGastosSubasta"] = $arrayOtrosGastosSubastas[$idAuto];
        foreach($arrayOtrosGastosSubastas[$idAuto] as $idGastos => $datosGasto){
            $sumOtrosGastos += $datosGasto["monto"];
        }
    }

    $arrayMontosAdm = $objGastosAdm->getMonto($datosAutos["valor_puja"]);

    $montoGastoAdm = $arrayMontosAdm["monto"];
    $ivaMontoGastoAdmin = $arrayMontosAdm["montoIva"];
    $totalMontoGastoAdm = $montoGastoAdm + $ivaMontoGastoAdmin;
    $arrayAutos[$idAuto]["gastosAdm"] = $montoGastoAdm;
    $arrayAutos[$idAuto]["gastosAdmIva"] = $ivaMontoGastoAdmin;
    $arrayAutos[$idAuto]["usuario"] = $arrayUsuarios[$datosAutos["id_usuario"]]["nombre"];
    $arrayAutos[$idAuto]["combustible"] = $arrCombus[$datosAutos["id_combustible"]]["nombre"];

    $arrayGastosTotales = $objAutosSubasta->calcularGastosTotales($datosAutos["valor_puja"], $datosAutos["iva_incluido"], $datosAutos["deuda_patente"], $datosAutos["deuda_infr_caba"], $datosAutos["deuda_infr_bsas"], $totalMontoGastoAdm, $datosAutos["comision_valor"], $sumOtrosGastos);

    $arrayAutos[$idAuto]["deudaTotal"] = $arrayGastosTotales["deudaTotal"];
    $arrayAutos[$idAuto]["totalAPagar"] = $arrayGastosTotales["totalAPagar"];
    $arrayAutos[$idAuto]["totalAPagarMasDeuda"] = $arrayGastosTotales["totalAPagar"] + $arrayGastosTotales["deudaTotal"];


    $objValorCalle = new ValorCalle($idAuto);
    $arrayValores = $objValorCalle->promedioValorYvalores();
    if(!empty($arrayValores)){
        //$arrayAutos[$idAuto]["listadoValorCalle"] = $arrayValores;
        $arrayAutos[$idAuto]["promedioValores"] = $objValorCalle->getPromedio($arrayValores);
    }

    //Ver que auto de la subasta ya fue comprados, obtener id de auto comprado.
    if($arrayAutos[$idAuto]["comprado"]==1){

      $objAutoComprado = new AutoComprado(0);
      $idAutoComprado = $objAutoComprado->getIdAuto_autoSubasta($idAuto);
      $arrayAutos[$idAuto]["idAutoComprado"] = $idAutoComprado;

    }

  }

/*
  echo "<pre>";
  print_r($arrayAutos);
  echo "</pre>";*/



/*
  echo "<pre>";
  print_r($arrayValores);
  echo "</pre>";*/

  $template->assign("arrayAutos", $arrayAutos);
  $template->assign("arrayPromValores", $arrayValores);
  $template->display('autosSubasta.tpl');
}else{
  echo "sin sesion";
}
