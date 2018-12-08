<?php

//Controller auto subasta
/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 21/11/18
 * Time: 00:36
 */
 include('core/models/AutosSubasta.class.php');

if(isset($_SESSION['user'])){


  //Add
  if(isset($_POST['addAutoSub'])){
    extract($_POST);

    $arrayData = array(
      "id_vendedor"           => $vendedor,
      "marca"                 => $marca,
      "modelo"                => $modelo,
      "ano"                   => $ano,
      "dominio"               => $dom,
      "kms"                   => $kms,
      "radicacion"            => $rad,
      "ubicacion"             => $ubi,
      "id_combustible"        => $comb,
      "arranca"               => $arranca,
      "iva_incluido"          => $ivaI,
      "comision"              => 10,
      "seguro_caucion"        => $caucion,       
      "observacion"           => $obs,
      "deuda_patente"         => $d_pat,
      "deuda_infr_caba"       => $d_inf_caba,
      "deuda_infr_bsas"       => $d_inf_bsas,
      "visita_observaciones"  => $obs_vis,
      "visita_puntaje"        => $vis_pun,
      "visita_valor_aprox"    => "",
      "valor_puja"            => $valor_puja,
      "precio_lista"          => $precio_lista,
      "gastos_aprox_gestor"   => $g_aprox_ges,
      "url_narvaez"           => $url_sitio,
      "fecha_cierre"          => $f_cierre,
      "hora_cierre"           => $h_cierre

    );
    /*
    echo "<pre>";
    print_r($arrayData);
    echo "</pre>";*/
    $objAutosSub = new AutosSubasta();
    $objAutosSub->setDatos($arrayData);

    try{
        echo $objAutosSub->addAuto();
    }catch(Exception $e){
      echo $e->getMessage() . " - ".$e->getCode();
    }


  }



  //Disable


}else{
  echo "Se perdio sesion, redirigir";
}

 ?>
