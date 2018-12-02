<?php

if(isset($_SESSION['user'])){
  include('core/models/Auto.class.php');
  include('core/models/AutosComprado.class.php');
  include('core/models/Usuarios.class.php');
  $template = new Smarty();
  $template->error_reporting = E_ALL & ~E_NOTICE;
  $template->setTemplateDir('./styles/templates/');
  $template->setCompileDir('./compiler');

  $objUsuarios = new Usuarios();
  $arrUsrs = $objUsuarios->getUsuarios();

  $objAutoComprado = new AutoComprado(0);
  $arrayAutosComprados = $objAutoComprado->listDatosAutos();

  foreach($arrayAutosComprados as $idAuto => $datosAuto){
    $arrayAutosComprados[$idAuto]["nombreUsr"] = $arrUsrs[$datosAuto["id_usuario_comprador"]]["nombre"];
  }
/*
  echo "<pre>";
  print_r($arrayAutosComprados);
  echo "</pre>";*/

  $template->assign("arrayAutosComprados", $arrayAutosComprados);

  $template->display('comprados/autosComprados.tpl');
}else{
	echo "sesion caduco";
}

?>
