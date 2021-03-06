<?php

/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 25/10/18
 * Time: 23:00
 */
class AutosGastosGestoria{

  private $idGasto;
  private $id_auto;
  private $id_usuario_pago;
  private $monto;
  private $observacion;
  private $pagado;
  private $fecha_pago;
  private $fecha;
  private $hora;
  private $id_usuario;
  private $estado;

  private $objConexion;

  public function __construct($idAuto){
    if($idAuto!=0){
      $this->id_auto = $idAuto;
    }
    $this->objConexion = Conexion::getInstance();
  }


  public function addGastosGestoria($usuarioPago, $monto, $observacion, $pagado, $fechaPago){
    $idAuto = $this->id_auto;


    $fechaCarga = date('Y-m-d');
    $horaCarga = date('H:i:s');
    $usuarioCarga = $_SESSION["id"];

    $sql = "INSERT INTO autos_gastos_gestoria
        (id_auto, id_usuario_pago, monto,observacion, pagado,
         fecha_pago,fecha, hora, id_usuario, estado) VALUES(?,?,?,?,?,?,?,?,?,1)";

    $stmt = $this->objConexion->mysqli->prepare($sql);
    $stmt->bind_param("iiisisssi", $idAuto, $usuarioPago, $monto, $observacion, $pagado, $fechaPago, $fechaCarga, $horaCarga, $usuarioCarga);
    $stmt->execute();

    if(!$stmt->errno){
      return 1;
    }else{
      throw new Exception("Error al ingresar gastos gestoria, ".$stmt->error, $stmt->errno);
    }
    $stmt->free_result();
    $stmt->close();
  }


  public function getGastos($f_estado=1){
    $idAuto = $this->id_auto;
    $arrayResponse = array();
    $sql = "SELECT id, id_auto, id_usuario_pago, monto, observacion, pagado, fecha_pago
            FROM autos_gastos_gestoria
            WHERE id_auto = ?
            AND estado = ?";
    $stmt = $this->objConexion->mysqli->prepare($sql);
    $stmt->bind_param('ii', $idAuto, $f_estado);
    $stmt->execute();
    $stmt->bind_result($id, $id_auto, $id_usuario_pago, $monto, $observacion, $pagado, $fecha_pago);

    if(!$stmt->errno){
      while($stmt->fetch()){
        $arrayResponse[$id] = array(
          "id"              =>$id,
          "id_auto"         =>$id_auto,
          "id_usuario_pago" =>$id_usuario_pago,
          "monto"           =>$monto,
          "observacion"     =>$observacion,
          "pagado"          =>$pagado,
          "fechaPago"       =>$fecha_pago
        );
      }

    }
    return $arrayResponse;
  }

  public function deleteGasto($idGasto){
    //$sql = "DELETE FROM autos_gastos_gestoria WHERE id = ?";
    $sql = "UPDATE autos_gastos_gestoria SET estado = 0 WHERE id = ?";
    $stmt = $this->objConexion->mysqli->prepare($sql);
    $stmt->bind_param('i', $idGasto);
    $stmt->execute();
    if(!$stmt->errno){
      return 1;
    }else{
      throw new Exception("Error al borrar gasto, ".$stmt->error, $stmt->errno);
    }
  }
}
