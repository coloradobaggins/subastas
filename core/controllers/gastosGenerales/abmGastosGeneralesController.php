<?php
/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 24/10/18
 * Time: 11:00
 */

 //ABM gastos generales

 if(isset($_SESSION['user'])){
   include('core/models/GastosGenerales.class.php');


   if(isset($_POST['addGasto'])){
     $objGastosG = new GastosGenerales();
     extract($_POST);

     try{
       echo $objGastosG->addGasto($monto, $detalle, $compradores, $fechaC);
     }catch(Exception $e){
       echo $e->getMessage();
     }

   }


   if(isset($_POST['deleteGasto'])){
     $objGastosG = new GastosGenerales();
     extract($_POST);

     try{
       echo $objGastosG->deleteGasto($idGasto);
     }catch(Exception $e){
       echo $e->getMessage();
     }
   }

 }

?>
