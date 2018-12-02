<?php
session_start();
/**
 * Created by PhpStorm.
 * User: coloBaggins
 * Date: 15/8/16
 * Time: 19:59
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("America/Argentina/Buenos_Aires");

$view = isset($_GET['view']) ? $_GET['view'] : 'index';
//Requerir smarty
require('core/libs/smarty/Smarty.class.php');
require('core/models/Conexion.class.php');
require('core/models/Main.class.php');

if(file_exists('core/controllers/'.$view.'Controller.php'))
{
    include('core/controllers/'.$view.'Controller.php');
}
else
{
    echo 'error, archivo no encontrado';
}
