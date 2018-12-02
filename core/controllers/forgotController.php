<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 13/09/2016
 * Time: 10:27
 */
//Envio el mail para recuperacion de pass
if(isset($_POST['forgotPass']))
{
    include_once('core/models/Usuarios.class.php');
    include_once('core/models/Usuario.class.php');
    $objUsuarios = new Usuarios();
    $arrayResponseUser = $objUsuarios->getUsuarioByEmail($_POST['mail']);


    if(!array_key_exists('error', $arrayResponseUser))
    {
        $objUsuario = new Usuario($arrayResponseUser["idUser"]);
        $objUsuario->__set('mail', $_POST['mail']);
        $arrayChangeToken = $objUsuario->updateTokenCode();
        if(!array_key_exists('error', $arrayChangeToken))
        {
            //Enviar mail recuperacion pass
            //TODO:: poner "online" cuando se suba la web, para que envie el mail con codigo!.
            echo $objUsuario->sendMailRecuperacionPass($arrayChangeToken, 'localhost');
        }
        else
        {
            //No se actualizo token
            echo $arrayChangeToken['error'];
            exit;
        }
    }else{
        echo $arrayResponseUser['error'];
        exit;
    }


    /*if($response != 'mail_vacio' && $response != 'mail_invalido' && $response != 'error_consulta' && $response != 'mail_inexistente')
    {
        $objUsuario = new Usuario($response);
        $objUsuario->__set('email', $_POST['mail']);
        $arrayChangeToken = $objUsuario->updateTokenCode();
        if(!array_key_exists('error', $arrayChangeToken))
        {
            //Enviar mail recuperacion pass
            //TODO:: poner "online" cuando se suba la web, para que envie el mail con codigo!.
            echo $objUsuario->sendMailRecuperacionPass($arrayChangeToken, 'localhost');
        }
        else
        {
            //No se actualizo token
            echo $arrayChangeToken['error'];
            exit;
        }
    }else{
        echo $response;
    }*/
}
else
{
    $template = new Smarty();
    $template->setTemplateDir('./styles/templates/');
    $template->setCompileDir('./compiler');
    $template->display('public/forgotPass.tpl');
}
