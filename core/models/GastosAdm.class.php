<?php

class GastosAdm{

  private $id;
  private $valor_oferta_desde;
  private $valor_oferta_hasta;
  private $monto;
  private $estado;

  private $objConexion;

  public function __construct(){
    $this->objConexion = Conexion::getInstance();
  }


  public function getMonto($puja){
    $arrayMontos = array();
    $sql = "SELECT id, monto FROM subastas_gestion_admin WHERE ? > valor_oferta_desde AND ? <= valor_oferta_hasta";

    $stmt = $this->objConexion->mysqli->prepare($sql);
    $stmt->bind_param('ii', $puja,$puja);
    $stmt->execute();
    $stmt->bind_result($id, $monto);
    if(!$stmt->errno){
      $stmt->fetch();
      $arrayMontos = array(
        "monto"     => $monto,
        "montoIva"  => $this->getIva($monto)
      );
    }else{
      throw new Exception("Error en la consulta, ".$stmt->error, $stmt->errno);
    }
    $stmt->free_result();
    $stmt->close();

    return $arrayMontos;
  }

  private function getIva($gastoAdm){
    $gastoConIva = 0;
    $iva = 21;

    $gastoConIva = ($iva * $gastoAdm) / 100;

    return $gastoConIva;
  }

}

?>
