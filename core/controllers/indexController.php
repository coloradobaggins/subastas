<?php
/**
 * Created by PhpStorm.
 * User: coloBaggins
 * Date: 15/8/16
 * Time: 20:42
 */


$template = new Smarty();
$template->error_reporting = E_ALL & ~E_NOTICE;
$template->setTemplateDir('./styles/templates/');
$template->setCompileDir('./compiler');
$template->display('public/login.tpl');