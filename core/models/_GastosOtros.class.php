<?php
//NO se la diferencia entre esta clase y AutosGastosOtros.class.php !!!
//No uso mas esta, uso la otra.
class GastosOtros{

	private $id;
	private $id_auto;
	private $id_usuario_pago;
	private $monto;
	private $observacion;
	private $pagado;
	private $fecha_realizacion;
	private $fecha;
	private $hora;
	private $id_usuario;
	private $estado;

	private $objConexion;

	public function __construct($idAuto){
		$this->id_auto = $idAuto;
		$this->objConexion = Conexion::getInstance();
	}

	public function getOtrosGastos($f_estado=1){
		$idAuto = $this->id_auto;
		$arrayResponse = array();

		$sql = "SELECT id, id_auto, id_usuario_pago, monto, observacion, pagado, fecha_realizacion
				FROM autos_gastos_otros
				WHERE id_auto = ? AND estado = ?";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param('ii', $idAuto, $f_estado);
		$stmt->execute();
		$stmt->bind_result($id, $id_auto, $id_usuario_pago, $monto, $observacion, $pagado, $fecha_realizacion);
		if(!$stmt->errno){
			while($stmt->fetch()){
				$arrayResponse[$id] = array(
					"id"	=> $id,
					"id_auto"	=> $id_auto,
					"id_usuario_pago"	=> $id_usuario_pago,
					"monto"	=> $monto,
					"observacion"	=> $observacion,
					"pagado"	=> $pagado,
					"fecha_realizacion"	=> $fecha_realizacion
				);
			}
		}else{
			throw new Exception("Error al obtener otros gastos del auto, ".$stmt->error, $stmt->errno);
		}
		$stmt->free_result();
		$stmt->close();

		return $arrayResponse;
	}

	public function addOtrosGastos($usuarioPago, $monto, $obs, $pagado, $fechaPago){


		$idAuto = $this->id_auto;

		$fechaCarga = date("Y-m-d");
		$horaCarga = date("H:i:s");
		$usuarioCarga = $_SESSION["id"];

		$sql = "INSERT INTO autos_gastos_otros
				(id_auto, id_usuario_pago, monto, observacion, pagado, fechaPago, fecha, hora, id_usuario, estado)
				 VALUES(?,?,?,?,?,?,?,?,?,1)";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param('iiisisssi', $idAuto, $usuarioPago, $monto, $obs, $pagado, $fechaPago, $fechaCarga, $horaCarga, $usuarioCarga);
		$stmt->execute();

		if(!$stmt->errno){
			return 1;
		}else{
			throw new Exception("Error al ingresar infraccion, ".$stmt->error, $stmt->errno);
		}
		$stmt->free_result();
		$stmt->close();

	}


	public function deleteOtrosGastos($idGasto){
		$sql = "DELETE FROM autos_gastos_otros WHERE id = ?";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param("i", $idGasto);
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
