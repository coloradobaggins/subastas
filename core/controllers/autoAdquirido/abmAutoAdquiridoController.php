<?php
if(isset($_SESSION['user'])){


	include('core/models/AutosGastosGestoria.class.php');
	include('core/models/AutosGastosInfr.class.php');
	include('core/models/AutosGastosOtros.class.php');
	include('core/models/Usuarios.class.php');


	//Gastos gestoria
	if(isset($_POST["addGastoG"])){
		extract($_POST);


		$objGastosGestoria = new AutosGastosGestoria($idAuto);
		try{

			echo $objGastosGestoria->addGastosGestoria($userPago, $monto, $detalle, $pagado, $fPago);

		}catch(Exception $e){
			echo $e->getMessage() . " - ".$e->getCode();
		}

	}

	//Gastos deudas infracciones
	if(isset($_POST["addGastoDInfr"])){
		extract($_POST);

		$objGInfr = new AutosGastosInfr($idAuto);

		try{

			echo $objGInfr->addInfraccion($userPago, $monto, $fInfr, $lugar, $detalle, $pagado);

		}catch(Exception $e){
			echo $e->getMessage() . " - " . $e->getCode();
		}
	}


	//Otros Gastos
	if(isset($_POST["addGastoOtros"])){
		extract($_POST);

		$objGastosOtros = new AutosGastosOtros($idAuto);

		try{

			echo $objGastosOtros->addOtrosGastos($userPago, $monto, $detalle, $pagado, $fPago);

		}catch(Exception $e){
			echo $e->getMessage() . " - " . $e->getCode();
		}

	}


	//**************************************************/
	//Delete gastos de auto
	//Gasto gestoria
	if(isset($_POST['deleteGastoG'])){
		$objGastosGestoria = new GastosGestoria();
	}

	//Gastos otros
	if(isset($_POST['deleteGastoO'])){

	}

	//Gastos infraccion
	if(isset($_POST['deleteGastoInfr'])){

	}


}else{
	echo "Sesion expiro";
}

?>
