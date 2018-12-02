<?php
/**
 * Created by PhpStorm.
 * User: coloBaggins
 * Date: 19/9/18
 * Time: 18:39
 */

if(isset($_SESSION['user'])){

  $template = new Smarty();
  $template->error_reporting = E_ALL & ~E_NOTICE;
  $template->setTemplateDir('./styles/templates/');
  $template->setCompileDir('./compiler');
  $template->display('home.tpl');
}else{
  echo "sin sesion";
}
