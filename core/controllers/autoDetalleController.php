<?php

//detalle auto subasta
include("core/models/AutosSubasta.class.php");
include("core/models/GastosAdm.class.php");
include("core/models/Usuarios.class.php");
include("core/models/ValorCalle.class.php");
//include("core/models/OtrosGastos.class.php");
include("core/models/SubastaGastosOtros.class.php");
include("core/models/Utils.class.php");

if(isset($_SESSION['user'])){
	include('core/models/AutosComprado.class.php');
  $template = new Smarty();
  $template->error_reporting = E_ALL & ~E_NOTICE;
  $template->setTemplateDir('./styles/templates/');
  $template->setCompileDir('./compiler');

  $idAuto = $_GET["idAuto"];



	$objUtils = new Utils();
	$arrCombus = $objUtils->getCombustibles();

	$objUsuarios = new Usuarios();
	$arrUsuarios = $objUsuarios->getUsuarios();

	$objAutosSubasta = new AutosSubasta();
	$arrDetallesAuto = $objAutosSubasta->getDatoAuto($idAuto);

	$arrDetallesAuto["usuario"] = $arrUsuarios[$arrDetallesAuto["id_usuario"]]["nombre"];
	$arrDetallesAuto["combustible"] = $arrCombus[$arrDetallesAuto["id_combustible"]]["nombre"];

	echo "<pre>";
	print_r($arrDetallesAuto);
	echo "</pre>";

	//Otros gastos subastas autos
	$objOtrosGastosSubastas = new SubastaGastosOtros();
	$arrayOtrosGastosSubastas = $objOtrosGastosSubastas-> getOtrosGastosSubasta($idAuto, 1, 1);
	$sumOtrosGastos = 0;
	if(count($arrayOtrosGastosSubastas)>0){
		foreach($arrayOtrosGastosSubastas as $idGastos => $datosGasto){
				$sumOtrosGastos += $datosGasto["monto"];
		}
	}
	echo "gastos otros!!";
	echo "<pre>";
	print_r($arrayOtrosGastosSubastas);
	echo "</pre>";

$objGastosAdm = new GastosAdm();
$arrGastosAdm = $objGastosAdm->getMonto($arrDetallesAuto["valor_puja"]);

$montoGastoAdm = $arrGastosAdm["monto"];
$ivaMontoGastoAdm = $arrGastosAdm["montoIva"];
$totalMontoGastoAdm = $montoGastoAdm + $ivaMontoGastoAdm;

echo "gastos adm> ";
echo "<pre>";
print_r($arrGastosAdm);
echo "</pre>";

$arrGastosTotales = $objAutosSubasta->calcularGastosTotales($arrDetallesAuto["valor_puja"], $arrDetallesAuto["iva_incluido"], $arrDetallesAuto["deuda_patente"], $arrDetallesAuto["deuda_infr_caba"], $arrDetallesAuto["deuda_infr_bsas"], $totalMontoGastoAdm, $arrDetallesAuto["comision_valor"], $sumOtrosGastos, $arrDetallesAuto["gastos_aprox_gestor"]);

echo "gastosTotalees>";
echo "<pre>";
print_r($arrGastosTotales);
echo "</pre>";


//Valores de autos parecidos
$objValorCalle = new ValorCalle($idAuto);
$arrValores = $objValorCalle->promedioValorYvalores();

echo "Valor calle: ";
echo "<pre>";
print_r($arrValores);
echo "</pre>";
$sumVal =  0;
$contVal = 0;
foreach($arrValores as $idValor => $datosV){
	$sumVal+= $datosV["valor"];
	$contVal++;
}
if($contVal != 0){
	$promVal = $sumVal / $contVal;
}


	if(!empty($arrDetallesAuto)){$template->assign("arrDetallesAuto", $arrDetallesAuto);}
	if(!empty($arrValores)){$template->assign("arrValores", $arrValores); $template->assign("promVal", $promVal);}
	if(!empty($arrGastosAdm)){$template->assign("arrGastosAdm", $arrGastosAdm);}
	if(!empty($arrGastosTotales)){$template->assign("arrGastosTotales", $arrGastosTotales);}
	if(!empty($arrayOtrosGastosSubastas)){$template->assign("arrayOtrosGastosSubastas", $arrayOtrosGastosSubastas);}
  $template->display('autoDetalle.tpl');
}else{
	echo "Sesion caduco";
}

?>
