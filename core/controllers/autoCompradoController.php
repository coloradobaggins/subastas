<?php
if(isset($_SESSION['user'])){

	include('core/models/AutosComprado.class.php');
	include('core/models/AutosGastosOtros.class.php');
	include('core/models/AutosGastosGestoria.class.php');
	include('core/models/AutosGastosInfr.class.php');
	include("core/models/ValorCalle.class.php");
	include('core/models/Utils.class.php');
	include('core/models/Usuarios.class.php');
  $template = new Smarty();
  $template->error_reporting = E_ALL & ~E_NOTICE;
  $template->setTemplateDir('./styles/templates/');
  $template->setCompileDir('./compiler');

  $idAuto = $_GET["idComprado"];

	$arrGastosPorUsr = array(); //Guardar gastos por usuario

  $objAutoComprado = new AutoComprado($idAuto);
  $arrayDatosAuto = $objAutoComprado->getDatosAuto();


	$objUtils = new Utils();
	$arrComb = $objUtils->getCombustibles();

	$arrayDatosAuto["combustible"] = $arrComb[$arrayDatosAuto["id_combustible"]]["nombre"];

	$objUsuarios = new Usuarios();
	$arrUsrs = $objUsuarios->getUsuarios();
	$arrayDatosAuto["nombre"] = $arrUsrs[$arrayDatosAuto["id_usuario_comprador"]]["nombre"];



	echo "<pre>";
  print_r($arrayDatosAuto);
  echo "</pre>";

	//Traer los valores cargados para el auto cuando estaba en subasta (para no volver a cargarlos)
	$objValorCalle = new ValorCalle($arrayDatosAuto["id_subasta"]);
	$arrValoresCalle = $objValorCalle->promedioValorYvalores();
	$sumVal =  0;
	$contVal = 0;
	foreach($arrValoresCalle as $idValor => $datosV){
		$sumVal+= $datosV["valor"];
		$contVal++;
	}
	if($contVal != 0){
		$promVal = $sumVal / $contVal;
	}



	$objGastosOtros = new AutosGastosOtros($idAuto);
	$arrGastosOtros = $objGastosOtros->getGastos();
	if(!empty($arrGastosOtros)){
		$sumGastosO = 0;
		foreach($arrGastosOtros as $idGasto => $datosGasto){
			$sumGastosO += $datosGasto["monto"];
			$arrGastosOtros[$idGasto]["usrPago"] = $arrUsrs[$datosGasto["id_usuario_pago"]]["nombre"];

			$arrGastosPorUsr[$arrUsrs[$datosGasto["id_usuario_pago"]]["nombre"]][] = $datosGasto["monto"];	//En cada nombre de usuario guardar el monto del gasto (index nombre de usr)
		}
		$template->assign("sumGastosO", $sumGastosO);
		$template->assign("arrGastosOtros", $arrGastosOtros);
	}

	/*
	echo "********** gastos otros****";
	echo "<pre>";
  print_r($arrGastosOtros);
  echo "</pre>";
	*/

	$objGastosInfr = new AutosGastosInfr($idAuto);
	$arrGastosInfr = $objGastosInfr->getInfracciones();
	if(!empty($arrGastosInfr)){
		$sumGastosInfr = 0;
		foreach($arrGastosInfr as $idGasto => $datosGasto){
			$sumGastosInfr += $datosGasto["monto"];
			$arrGastosInfr[$idGasto]["usrPago"] = $arrUsrs[$datosGasto["id_usuario_pago"]]["nombre"];

			$arrGastosPorUsr[$arrUsrs[$datosGasto["id_usuario_pago"]]["nombre"]][] = $datosGasto["monto"];	//En cada nombre de usuario guardar el monto del gasto (index nombre de usr)
		}
		$template->assign("sumGastosInfr", $sumGastosInfr);
		$template->assign("arrGastosInfr", $arrGastosInfr);
	}

		/*
		echo "********** gastos Infr****";
		echo "<pre>";
  	print_r($arrGastosInfr);
  	echo "</pre>";*/


	$objGastosGestoria = new AutosGastosGestoria($idAuto);
	$arrGastoGestoria = $objGastosGestoria->getGastos();
	if(!empty($arrGastoGestoria)){
		$sumGastosG = 0;
		foreach($arrGastoGestoria as $idGasto => $datosGastoG){
			$sumGastosG += $datosGastoG["monto"];
			$arrGastoGestoria[$idGasto]["usrPago"] = $arrUsrs[$datosGastoG["id_usuario_pago"]]["nombre"];

			$arrGastosPorUsr[$arrUsrs[$datosGastoG["id_usuario_pago"]]["nombre"]][] = $datosGastoG["monto"];	//En cada nombre de usuario guardar el monto del gasto (index nombre de usr)
		}
		$template->assign("sumGastosG", $sumGastosG);
		$template->assign("arrGastosGes", $arrGastoGestoria);
	}


	/*
	echo "********** gastos gestoria****";
	echo "<pre>";
  print_r($arrGastoGestoria);
  echo "</pre>";


	echo "********** gastos x Usuario****";
	echo "<pre>";
  print_r($arrGastosPorUsr);
  echo "</pre>";*/

	$template->assign("arrGastosPorUsr", $arrGastosPorUsr);
	$template->assign("arrUsrs", $arrUsrs);
	$template->assign("arrDatosAuto", $arrayDatosAuto);
	if(!empty($arrValoresCalle)){$template->assign("arrValoresCalle", $arrValoresCalle); $template->assign("promVal", $promVal);}

  $template->display('comprados/autoComprado.tpl');

}else{
  echo "Sesion caduco";
}

?>
