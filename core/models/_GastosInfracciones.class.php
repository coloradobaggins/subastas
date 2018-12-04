<?php
//NO se la diferencia entre esta clase y AutosGastosInfr.class.php !!!
//No uso mas esta, uso la otra.
class GastosInfracciones{

	private $id;
	private $id_auto;
	private $id_usuario_pago;
	private $monto;
	private $fecha_infraccion;
	private $lugar;
	private $observacion;
	private $pagado;
	private $fecha;
	private $hora;
	private $id_usuario;
	private $estado;

	private $objConexion;

	public function __construct($idAuto){
		$this->id_auto = $idAuto;
		$this->objConexion = Conexion::getInstance();
	}

	public function getInfracciones($f_estado=1){
		$idAuto = $this->id_auto;
		$arrayResponse = array();
		$sql = "SELECT id, id_auto, id_usuario_pago, monto, fecha_infraccion, lugar, observacion, pagado, fecha, hora, id_usuario, estado
				FROM autos_gastos_infracciones
				WHERE id_auto = ?
				AND estado = ?";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param("ii", $idAuto, $f_estado);
		$stmt->execute();
		$stmt->bind_result($id, $id_auto, $id_usuario_pago, $monto, $fecha_infraccion, $lugar, $observacion, $pagado);
		if(!$stmt->errno){
			while($stmt->fetch()){
				$arrayResponse[$id] = array(
					"id"	=> $id,
					"idAuto"	=> $id_auto,
					"idUsuarioPago"	=> $id_usuario_pago,
					"monto"	=> $monto,
					"fechaInfraccion"	=> $fecha_infraccion,
					"lugar"	=> $lugar,
					"observacion"	=> $observacion,
					"pagado"	=> $pagado
				);
			}
		}else{
			throw new Exception("Error al obtener infracciones para este vehiculo. ".$stmt->error, $stmt->errno);
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

	public function deleteInfraccion($idInfr){
		$sql = "DELETE FROM autos_gastos_infracciones WHERE id = ?";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param("i", $idInfr);
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
