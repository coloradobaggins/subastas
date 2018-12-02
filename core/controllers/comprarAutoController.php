<?php
//Comprar auto controller


if(isset($_SESSION["user"])){
	include('core/models/AutosSubasta.class.php');
	if(isset($_POST["comprarAuto"])){
		extract($_POST);

		$objAutosSubasta = new AutosSubasta();
		try{
				$objAutosSubasta->comprarAuto($idAuto, $idComprador, $fechaCompra, $monto);
		}catch(Exception $e){
			echo $e->getMessage();
		}



	}

}

?>
