<?php
/**
 * Created by PhpStorm.
 * User: coloBaggins
 * Date: 7/1/17
 * Time: 16:22
 */

require('core/models/Servicios/TecnicaAplicacion.class.php');

$template = new Smarty();
$template->error_reporting = E_ALL & ~E_NOTICE;
$template->setTemplateDir('./styles/templates/');
$template->setCompileDir('./compiler');

$idTecnica = $_GET['idTec'];

$objTecnica = new TecnicaAplicacion($idTecnica);
$arrayContenidoTecnica = $objTecnica->getContenido();

$comentariosPost = $objTecnica->getComments();

/*echo '<pre>';
print_r($comentariosPost);
echo '</pre>';*/



$template->assign("idPost", $idTecnica);

if(!empty($arrayContenidoTecnica)){
    $template->assign('arrayContenidoTecnica', $arrayContenidoTecnica);
}

if(!empty($comentariosPost)){
  $template->assign("comentariosPost", $comentariosPost);
}




$template->display('servicios/serviciosTecAplicDetalle.tpl');
