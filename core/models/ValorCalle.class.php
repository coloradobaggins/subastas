<?php

/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 25/9/18
 * Time: 22:00
 */
class ValorCalle
{
  private $idValor;
  private $idAuto;
  private $valor;
  private $url;
  private $estado;


  private $objConexion;

  public function __construct($id_auto){
    $this->idAuto = $id_auto;
    $this->objConexion = Conexion::getInstance();
  }

  /**
  * Busca en db los valores cargados en valor_calle
  **/
  public function promedioValorYvalores($f_estado=1){
    $idAuto = $this->idAuto;
    $arrayResponse = array();

    $estadoType = (is_string($f_estado)) ? 's' : 'i';

    $sql = "SELECT id, id_auto, valor
            FROM subastas_valor_calle
            WHERE id_auto = ?
            AND estado = ?";
    $stmt = $this->objConexion->mysqli->prepare($sql);
    $stmt->bind_param('i'.$estadoType, $idAuto, $f_estado);
    $stmt->execute();
    $stmt->bind_result($id, $id_auto, $valor);
    if(!$stmt->errno){
      while($stmt->fetch()){
        $arrayResponse[$id] = array(
          "id"    => $id,
          "valor" => $valor
        );
      }/*
      if(!empty($arrayResponse)){
          $arrayResponse["promedio"] = $this->getPromedio($arrayResponse);
      }*/
    }else{
      throw new Exception("ERror en obtener promedios de valor autos, ".$stmt->error, $stmt->errno);
    }

    $stmt->free_result();
    $stmt->close();
    return $arrayResponse;
  }

  /**
  * Hace el promedio de los valores pasados en array, de los valores en calle
  **/
  public function getPromedio($arrayPromedios=array()){
    $cont = 0;
    $sumValor = 0;
      foreach($arrayPromedios as $idAuto=> $datosAuto){
          $sumValor = $sumValor += $datosAuto["valor"];
          $cont++;
      }
    return round($sumValor / $cont);
  }


  /**
  * Agregar valor calle a la db
  **/
  public function addValorCalle($valor, $url){
    $idAuto = $this->idAuto;
    $sql = "INSERT INTO subastas_valor_calle(id_auto, valor, url, estado) VALUES(?, ?, ?, 1)";
    $stmt = $this->objConexion->mysqli->prepare($sql);
    $stmt->bind_param('iis',$idAuto, $valor, $url);
    $stmt->execute();
    if(!$stmt->errno){
      return 1;
    }else{
      throw new Exception("Error en agregar valor, ".$stmt->error, $stmt->errno);
    }
    $stmt->free_result();
    $stmt->close();
  }

  //Borrar valor
  public function deleteValorCalle($idValor){
    $sql = "DELETE FROM subastas_valor_calle WHERE id=?";

    $stmt = $this->objConexion->mysqli->prepare($sql);
    $stmt->bind_param('i', $idValor);
    $stmt->execute();

    if(!$stmt->errno){
      return 1;
    }else{
      throw new Exception("Error al borrar valor, ".$stmt->error, $stmt->errno);
    }
    $stmt->free_result();
    $stmt->close();
  }


}
