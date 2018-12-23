<?php

/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 29/10/18
 * Time: 00:10
 */
class AutosGastosInfr{

  private $idGasto;
  private $id_auto;
  private $id_usuario_pago;
  private $monto;
  private $fecha_infraccion;
  private $lugar;
  private $observacion;
  private $pagado;
  private $fechaPago;
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

  public function getInfracciones($f_estado=1){
    $idAuto = $this->id_auto;
    $arrayResponse = array();

    $sql = "SELECT id, id_auto, id_usuario_pago, monto, fecha_infraccion, lugar,
                    observacion, pagado, fechaPago, fecha, hora, id_usuario, estado
            FROM autos_gastos_infracciones
            WHERE id_auto = ?
            AND estado = ?";
    $stmt = $this->objConexion->mysqli->prepare($sql);
    $stmt->bind_param('ii', $idAuto, $f_estado);
    $stmt->execute();
    $stmt->bind_result($id, $id_auto, $id_usuario_pago, $monto, $fecha_infraccion, $lugar,
                    $observacion, $pagado, $fechaPago, $fecha, $hora, $id_usuario, $estado);
    if(!$stmt->errno){
      while($stmt->fetch()){
        $arrayResponse[$id] = array(
          "id"                =>$id,
          "id_auto"           =>$id_auto,
          "id_usuario_pago"   =>$id_usuario_pago,
          "monto"             =>$monto,
          "fecha_infraccion"  =>$fecha_infraccion,
          "lugar"             =>$lugar,
          "observacion"       =>$observacion,
          "pagado"            =>$pagado,
          "fechaPago"         =>$fechaPago,
          "id_usuari"         =>$id_usuario
        );
      }
    }else{
      throw new Exception("Error al obtener infracciones, ".$stmt->error, $stmt->errno);
    }
    $stmt->free_result();
    $stmt->close();

    return $arrayResponse;
  }


  public function addInfraccion($usuarioPago, $monto, $fInfraccion, $lugar, $obs, $pagado=0){
		$idAuto = $this->id_auto;

		$fechaCarga = date("Y-m-d");
		$horaCarga = date("H:i:s");
		$usuarioCarga = $_SESSION["id"];

		$sql = "INSERT INTO autos_gastos_infracciones
				(id_auto, id_usuario_pago, monto, fecha_infraccion, lugar,
				observacion, pagado, fecha, hora, id_usuario, estado) VALUES(?,?,?,?,?,?,?,?,?,?,1)";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param('iiisssissi', $idAuto, $usuarioPago, $monto, $fInfraccion, $lugar, $obs, $pagado, $fechaCarga, $horaCarga, $usuarioCarga);
		$stmt->execute();

		if(!$stmt->errno){
			return 1;
		}else{
			throw new Exception("Error al ingresar infraccion, ".$stmt->error, $stmt->errno);
		}
		$stmt->free_result();
		$stmt->close();

	}

  //CORREGIR, QUE NO SE BORRE, QUE CAMBIE EL ESTADO A 0
  public function deleteInfraccion($idGasto){
		//$sql = "DELETE FROM autos_gastos_infracciones WHERE id = ?";
    $nuevoEstado = 0;
    $sql = "UPDATE autos_gastos_infracciones
            SET estado = ?
            WHERE id = ?";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param("ii", $nuevoEstado, $idGasto);
		$stmt->execute();
		if(!$stmt->errno){
			return 1;
		}else{
			throw new Exception("Error al borrar infraccion, ".$stmt->error, $stmt->errno);
		}
		$stmt->free_result();
		$stmt->close();
	}

}

?>
