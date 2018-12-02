<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13/09/2016
 * Time: 15:30
 */
include_once('core/models/Usuario.class.php');
include_once('core/models/Acceso.class.php');

if(!empty($_GET['id']) && !empty($_GET['code']))
{
    /*echo '<pre>';
    print_r($_GET);
    echo '</pre>';*/

    $template = new Smarty();
    $template->setTemplateDir('./styles/templates/');
    $template->setCompileDir('./compiler');

    $idUserDecoded  = base64_decode($_GET['id']);
    $_SESSION['id'] = $idUserDecoded;
    $_SESSION['code'] = $_GET['code'];

    $objUser = new Usuario($idUserDecoded);
    $arrayDatosCuenta = $objUser->getDatosCuenta();
    if(!array_key_exists('error', $arrayDatosCuenta))
    {
        $template->assign('user', $arrayDatosCuenta['user']);
        $template->display('public/resetPass.tpl');
    }else{
        echo $arrayDatosCuenta["error"];
        exit;
    }

}else{
    //header("Location: ?view=login");
}

if(isset($_POST['reset']))
{
    extract($_POST);
    if(isset($_SESSION['id'], $_SESSION['code']))
    {
        $objUser = new Usuario($_SESSION['id']);
        $idUser = $objUser->__get('idUsuario');
        $responseUpdate = $objUser->updatePassReset($pass, $cPass, $idUser, $_SESSION['code']);

        if($responseUpdate==1){unset($_SESSION['id'], $_SESSION['code']); session_destroy();}

        echo $responseUpdate;
    }
    else
    {
        //Se perdió la sesion y el token
        //Redirigir en ese caso a forgot, para introducir el mail.
        echo "redirigir";
    }
}