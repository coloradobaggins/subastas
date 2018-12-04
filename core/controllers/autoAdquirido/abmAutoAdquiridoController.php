<?php
if(isset($_SESSION['user'])){


	include('core/models/GastosGestoria.class.php');
	include('core/models/GastosInfracciones.class.php');
	include('core/models/GastosOtros.class.php');
	include('core/models/Usuarios.class.php');


	//Gastos gestoria
	if(isset($_POST["addGastoG"])){
		extract($_POST);


		$objGastosGestoria = new GastosGestoria($idAuto);
		try{

			echo $objGastosGestoria->addGastosGestoria($userPago, $monto, $detalle, $pagado, $fPago);

		}catch(Exception $e){
			echo $e->getMessage() . " - ".$e->getCode();
		}

	}

	//Gastos deudas infracciones
	if(isset($_POST["addGastoDInfr"])){
		extract($_POST);

		$objGInfr = new GastosInfracciones($idAuto);

		try{

			echo $objGInfr->addInfraccion($userPago, $monto, $fInfr, $lugar, $detalle, $pagado);

		}catch(Exception $e){
			echo $e->getMessage() . " - " . $e->getCode();
		}
	}


	//Otros Gastos
	if(isset($_POST["addGastoOtros"])){
		extract($_POST);

		$objGastosOtros = new GastosOtros($idAuto);

		try{

			echo $objGastosOtros->addOtrosGastos($userPago, $monto, $detalle, $pagado, $fPago);

		}catch(Exception $e){
			echo $e->getMessage() . " - " . $e->getCode();
		}

	}


	//**************************************************/
	//Delete gastos


}else{
	echo "Sesion expiro";
}

?>
