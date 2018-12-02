<?php
/**
 * Created by PhpStorm.
 * User: coloBaggins
 * Date: 5/9/16
 * Time: 23:30
 */
include_once('core/models/Acceso.class.php');
if(!isset($_SESSION['user'])) //Si no hay sesion...
{

    if($_POST)//Si se envio form
    {
        if(isset($_POST['login'])){
          extract($_POST);
          try{
                $objAcceso = new Acceso();
                $objAcceso->login($email, $pass);
          }catch(Exception $e){
              //echo $e->getMessage() . " " . $e->getCode();
              echo $e->getCode();
          }
        }

    }
}

//Check Session abierta
if(isset($_POST['checkSession'])){
    if(isset($_SESSION['user'])){
      echo 1;
    }

}
