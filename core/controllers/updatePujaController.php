<?php
/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 26/9/18
 * Time: 10:21
 */
include("core/models/Autos.class.php");

if(isset($_SESSION['user'])){

  if(isset($_POST['updatePuja'])){
    extract($_POST);
    $objAutos = new Autos();
    echo $objAutos->addPuja($idAuto, $valorPuja);
  }

}
?>
