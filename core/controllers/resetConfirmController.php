<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 14/09/2016
 * Time: 14:46
 */
if(!isset($_SESSION['id']))
{
    $template = new Smarty();
    $template->setTemplateDir('./styles/templates/');
    $template->setCompileDir('./compiler');
    $template->display('public/resetPassConfirm.tpl');
}else
{
    header('Location: ?view=index');
}