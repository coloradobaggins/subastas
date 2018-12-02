<?php
/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 29/9/18
 * Time: 15:00
 */


 if(isset($_SESSION['user'])){
   include('core/models/GastosGenerales.class.php');
   include('core/models/Usuarios.class.php');
   $template = new Smarty();
   $template->error_reporting = E_ALL & ~E_NOTICE;
   $template->setTemplateDir('./styles/templates/');
   $template->setCompileDir('./compiler');

   $objUsuarios = new Usuarios();
   $arrayUsuarios = $objUsuarios->getUsuarios();



   $objGastosGenerales = new GastosGenerales();
   $defaultIniDate = date("Y")."-01-01"; //Siempre el primer dia del corriente anio como fecha inicial.
   try{

     $arrayGastos =$objGastosGenerales->getGastos($defaultIniDate, date("Y-m-d"));
     foreach($arrayGastos as $idGasto => $datosGasto){
       $arrayGastos[$idGasto]["usuarioCompra"] = $arrayUsuarios[$datosGasto["id_usuario_pago"]]["nombre"];
     }

   }catch(Exception $e){
      echo $e->getMessage() . " " . $e->getCode();
   }


   try{
      $arrayGastosPorUser = $objGastosGenerales->getResumenGastosUsuario($defaultIniDate, date("Y-m-d"));
      $arrayGastosUsr = array();
      $totalGastos = 0;
      foreach($arrayGastosPorUser as $idUser => $datosUsuarios){
          foreach($datosUsuarios as $idGastos => $datosGastos){
            $totalGastos += $datosGastos["monto"];
          }
          $arrayGastosUsr[$idUser]["usr"] = $arrayUsuarios[$idUser]["nombre"];
          $arrayGastosUsr[$idUser]["sumaGastos"] = $totalGastos;
          $totalGastos = 0;
      }
   }catch(Exception $e){
     echo $e->getMessage() . " " . $e->getCode();
   }


    /*
    echo "<pre>";
    print_r($arrayGastosPorUser);
    echo "</pre>";*/




/*
   echo "<pre>";
   print_r($arrayGastos);
   echo "</pre>";*/


   $template->assign("arrayGastos", $arrayGastos);
   $template->assign("arrayGastosUsr", $arrayGastosUsr);
   $template->display('gastosGenerales/gastosGenerales.tpl');
 }


 ?>
