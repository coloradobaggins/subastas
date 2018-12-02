<?php
if(isset($_SESSION['user'])){

	include('core/models/AutosComprado.class.php');
	include('core/models/AutosGastosOtros.class.php');
	include('core/models/AutosGastosGestoria.class.php');
	include('core/models/AutosGastosInfr.class.php');
	include('core/models/Usuarios.class.php');
  $template = new Smarty();
  $template->error_reporting = E_ALL & ~E_NOTICE;
  $template->setTemplateDir('./styles/templates/');
  $template->setCompileDir('./compiler');

  $idAuto = $_GET["idComprado"];

  $objAutoComprado = new AutoComprado($idAuto);
  $arrayDatosAuto = $objAutoComprado->getDatosAuto();

	$objUsuarios = new Usuarios();
	$arrUsrs = $objUsuarios->getUsuarios();
	$arrayDatosAuto["nombre"] = $arrUsrs[$arrayDatosAuto["id_usuario_comprador"]]["nombre"];
  echo "<pre>";
  print_r($arrayDatosAuto);
  echo "</pre>";


	$objGastosOtros = new AutosGastosOtros($idAuto);
	$arrGastosOtros = $objGastosOtros->getGastos();
	if(!empty($arrGastosOtros)){
		foreach($arrGastosOtros as $idGasto => $datosGasto){
			$arrGastosOtros[$idGasto]["usrPago"] = $arrUsrs[$datosGasto["id_usuario_pago"]]["nombre"];
		}
		$template->assign("arrGastosOtros", $arrGastosOtros);
	}


	$objGastosInfr = new AutosGastosInfr($idAuto);
	$arrGastosInfr = $objGastosInfr->getInfracciones();
	if(!empty($arrGastosInfr)){
		foreach($arrGastosInfr as $idGasto => $datosGasto){
			$arrGastosInfr[$idGasto]["usrPago"] = $arrUsrs[$datosGasto["id_usuario_pago"]]["nombre"];
		}
		$template->assign("arrGastosInfr", $arrGastosInfr);
	}

	echo "********** gastos Infr****";
	echo "<pre>";
  	print_r($arrGastosInfr);
  	echo "</pre>";


	$objGastosGestoria = new AutosGastosGestoria($idAuto);
	$arrGastoGestoria = $objGastosGestoria->getGastos();
	if(!empty($arrGastoGestoria)){
		foreach($arrGastosOtros as $idGasto => $datosGastoG){
			$arrGastoGestoria[$idGasto]["usrPago"] = $arrUsrs[$datosGastoG["id_usuario_pago"]]["nombre"];
		}
		$template->assign("arrGastosGes", $arrGastoGestoria);
	}


	echo "********** gastos gestoria****";
	echo "<pre>";
  print_r($arrGastoGestoria);
  echo "</pre>";

  	
  	
	$template->assign("arrUsrs", $arrUsrs);
	$template->assign("arrDatosAuto", $arrayDatosAuto);

  $template->display('comprados/autoComprado.tpl');

}else{
  echo "Sesion caduco";
}

?>
