<?php

  if(isset($_SESSION["user"])){
  include('core/models/ValorCalle.class.php');

    if(isset($_POST["addValorCalle"])){
      extract($_POST);
      $objValorCalle = new ValorCalle($idAuto);
      echo $objValorCalle->addValorCalle($valor, $url);
    }

    if(isset($_POST['borrarValorCalle'])){
      
      $objValorCalle = new ValorCalle(0); //Paso 0, porque la clase me pide un valor, y para este metodo no importa el idAuto, es para que no me tire error.
      echo $objValorCalle->deleteValorCalle($_POST["idValor"]);
    }

  }else{
    echo "se perdio la sesion";
  }
?>
