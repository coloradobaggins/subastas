<?php

/**
 * Created by Sublime.
 * User: coloBaggins
 * Date: 01/10/18
 * Time: 11:00
 */
class AutoComprado{
	private $idAuto;
	private $id_subasta; // Puede estar seteado o no
	private $marca;
	private $modelo;
	private $ano;
	private $dominio;
	private $kms;
	private $radicacion;
	private $idCombustible;
	private $arranca;

	private $observacion;
	private $monto;
	private $id_deudas;
	private $gastos_gestor;

	private $id_usuario_comprador;
	private $fecha_compra;
	private $id_usuario;
	private $fecha;
	private $hora;
	private $estado;

	private $objCon;

	public function __construct($idAuto){	//Mandar 0 cuando no sea necesario el id del auto
		if($idAuto!=0){
			$this->idAuto = $idAuto;
		}

		$this->objConexion = Conexion::getInstance();

	}


	//Datos de 1 solo auto, para detalle
	public function getDatosAuto($f_estado=1){
		$idAuto = $this->idAuto;
		$arrayResponse = array();

		$sql = "SELECT id, id_subasta, marca, modelo, ano, dominio, kms, radicacion, id_combustible, arranca,
				observacion, monto, gastos_gestor, id_usuario_comprador, fecha_compra
				FROM auto_comprado
				WHERE id = ? AND estado = ?";

		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param('ii', $idAuto, $f_estado);
		$stmt->execute();
		$stmt->bind_result($id, $id_subasta, $marca, $modelo, $ano, $dominio, $kms, $radicacion, $id_combustible, $arranca,
				$observacion, $monto, $gastos_gestor, $id_usuario_comprador, $fecha_compra);

		if(!$stmt->errno){
			$stmt->fetch();
			$arrayResponse =array(

				"id"	=> $id,
				"id_subasta"	=> $id_subasta,
				"marca"	=> $marca,
				"modelo"	=> $modelo,
				"ano"	=> $ano,
				"dominio"	=> $dominio,
				"kms"	=> $kms,
				"radicacion"	=> $radicacion,
				"id_combustible"	=> $id_combustible,
				"arranca"	=> $arranca,
				"observacion"	=> $observacion,
				"monto"	=> $monto,
				"gastos_gestor"	=> $gastos_gestor,
				"id_usuario_comprador"	=> $id_usuario_comprador,
				"fecha_compra"	=> $fecha_compra

			);
		}else{
			throw new Exception("Error en obtener datos de auto, ".$stmt->error, $stmt->errno);
		}
		$stmt->free_result();
		$stmt->close();

		return $arrayResponse;
	}

	//listado de autos
	public function listDatosAutos($f_estado=1){
		$arrayResponse = array();

		$sql = "SELECT id, id_subasta, marca, modelo, ano, dominio, kms, radicacion, id_combustible, arranca,
				observacion, monto, gastos_gestor, id_usuario_comprador, fecha_compra
				FROM auto_comprado
				WHERE estado = ?";

		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param('i', $f_estado);
		$stmt->execute();
		$stmt->bind_result($id, $id_subasta, $marca, $modelo, $ano, $dominio, $kms, $radicacion, $id_combustible, $arranca,
				$observacion, $monto, $gastosGestor, $id_usuario_comprador, $fecha_compra);

		if(!$stmt->errno){
			while($stmt->fetch()){

				$arrayResponse[$id] = array(

					"id"			=> $id,
					"id_subasta"	=> $id_subasta,
					"marca"			=> $marca,
					"modelo"		=> $modelo,
					"ano"			=> $ano,
					"dominio"		=> $dominio,
					"kms"			=> $kms,
					"radicacion"	=> $radicacion,
					"id_combustible"=> $id_combustible,
					"arranca"		=> $arranca,
					"observacion"	=> $observacion,
					"monto"			=> $monto,
					"gastosGestor"	=> $gastosGestor,
					"id_usuario_comprador"	=> $id_usuario_comprador,
					"fecha_compra"	=> $fecha_compra

				);
			}

		}else{
			throw new Exception("Error en obtener datos de auto, ".$stmt->error, $stmt->errno);
		}
		$stmt->free_result();
		$stmt->close();

		return $arrayResponse;
	}

	public function addNuevoAuto($idSubasta="", $marca, $modelo, $ano, $dominio, $kms, $radicacion, $id_combustible, $arranca, $observacion, $monto, $id_deudas, $gastosGestor, $id_usuario_comprador, $fecha_compra){

		$fechaCarga = date("Y-m-d");
		$horaCarga = date("H:i:s");
		$usuarioCarga = $_SESSION["id"];

		$sql = "INSERT INTO auto_comprado
				(id_subasta, marca, modelo, ano, dominio, kms, radicacion, id_combustible, arranca,
				observacion, monto, id_deudas, gastosGestor, id_usuario_comprador, fecha_compra, id_usuario, fecha, hora, estado)
				VALUES (?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param('issisisiisiiiisiss', $idSubasta, $marca, $modelo, $ano, $dominio, $kms, $radicacion, $id_combustible, $arranca, $observacion, $monto, $id_deudas, $gastosGestor, $id_usuario_comprador, $fecha_compra, $usuarioCarga, $fechaCarga, $horaCarga);
		$stmt->execute();
		if(!$stmt->errno){
			return 1;
		}else{
			throw new Exception("Error al ingresar auto, ".$stmt->error, $stmt->errno);
		}
		$stmt->free_result();
		$stmt->close();
	}


	public function getDeudasAuto($f_estado=1){
		$idAuto = $this->idAuto;
		$arrayResponse = array();

		$sql = "SELECT id, id_auto_comprado, monto, detalle, pagado, id_usuario_pago, fecha_pago
				FROM auto_comprado_deudas
				WHERE id_auto_comprado = ?
				AND estado = ?";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param('ii', $idAuto, $f_estado);
		$stmt->execute();
		$stmt->bind_result();

		if(!$stmt->errno){
			$arrayResponse[$id_auto_comprado][$id] = array(
				"id"	=> $id,
				"id_auto_comprado"	=> $id_auto_comprado,
				"monto"	=> $monto,
				"detalle"	=> $detalle,
				"pagado"	=> $pagado,
				"id_usuario_pago"	=> $id_usuario_pago,
				"fecha_pago"	=> $fecha_pago
			);
		}else{
			throw new Exception("Error al obtener deudas auto comprado, ".$stmt->error, $stmt->errno);
		}
		$stmt->free_result();
		$stmt->close();

		return $arrayResponse;
	}

	//Return id auto, de un idAutoSubasta
	public function getIdAuto_autoSubasta($idAutoSubasta){
		$sql = "SELECT id FROM auto_comprado WHERE id_subasta = ?";
		$stmt = $this->objConexion->mysqli->prepare($sql);
		$stmt->bind_param('i', $idAutoSubasta);
		$stmt->execute();
		$stmt->bind_result($id);
		if(!$stmt->errno){
			$stmt->fetch();
			return $id;
		}else{
			throw new Exception("Error, algo paso a buscar idComprado con idSubasta, ".$stmt->error, $stmt->errno);
		}
		$stmt->free_result();
		$stmt->close();
	}
}

?>
