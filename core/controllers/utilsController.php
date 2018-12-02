<?php
//Utils controller, busqueas generales

include('core/models/Usuarios.class.php');
 
if(isset($_POST["getUsuarios"])){
	$objUsuarios = new Usuarios();
	$arrUsuarios = $objUsuarios->getUsuarios();
	echo json_encode($arrUsuarios);
}

?>