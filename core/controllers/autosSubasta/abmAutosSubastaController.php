<?php

//Controller auto subasta
/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 21/11/18
 * Time: 00:36
 */
 include('core/models/AutosSubasta.class.php');
 include('core/models/SubastaGastosOtros.class.php');

if(isset($_SESSION['user'])){


  //Add
  if(isset($_POST['addAutoSub'])){
    extract($_POST);

    $arrayData = array(
      "id_vendedor"           => $vendedor,
      "marca"                 => $marca,
      "modelo"                => $modelo,
      "ano"                   => $ano,
      "dominio"               => $dom,
      "kms"                   => $kms,
      "radicacion"            => $rad,
      "ubicacion"             => $ubi,
      "id_combustible"        => $comb,
      "arranca"               => $arranca,
      "iva_incluido"          => $ivaI,
      "comision"              => 10,
      "seguro_caucion"        => $caucion,
      "caucion_paga"          => $caucion_paga,
      "observacion"           => $obs,
      "deuda_patente"         => $d_pat,
      "deuda_infr_caba"       => $d_inf_caba,
      "deuda_infr_bsas"       => $d_inf_bsas,
      "visita_observaciones"  => $obs_vis,
      "visita_puntaje"        => $vis_pun,
      "visita_valor_aprox"    => "",
      "valor_puja"            => $valor_puja,
      "precio_lista"          => $precio_lista,
      "gastos_aprox_gestor"   => $g_aprox_ges,
      "url_narvaez"           => $url_sitio,
      "fecha_cierre"          => $f_cierre,
      "hora_cierre"           => $h_cierre

    );
    /*
    echo "<pre>";
    print_r($arrayData);
    echo "</pre>";*/
    $objAutosSub = new AutosSubasta();
    $objAutosSub->setDatos($arrayData);

    try{
        echo $objAutosSub->addAuto();
    }catch(Exception $e){
      echo $e->getMessage() . " - ".$e->getCode();
    }


  }


  /*************
  * Add gastos otros auto subasta
  *************/
  if(isset($_POST["addGastoO"])){
    extract($_POST);

    $objSubGO = new SubastaGastosOtros();

    try{
      echo $objSubGO->addOtrosGastoSubasta($idAuto, $detalle, $monto, $userPago, $fPago);
    }catch(Exception $e){
      echo $e->getMessage()." ".$e->getCode();
    }

  }


  /*************
  * Delete gastos otros auto subasta
  *************/
  if(isset($_POST["borrarGO"])){

    $objSubGO = new SubastaGastosOtros();

    try{
      echo $objSubGO->deleteGO($_POST["idGasto"]);
    }catch(Exception $e){
      echo $e->getMessage()." ".$e->getCode();
    }
  }


}else{
  echo "Se perdio sesion, redirigir";
}

 ?>
