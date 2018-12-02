<?php

  class GastosGenerales{


    private $id;
    private $monto;
    private $observacion;
    private $id_usuario_pago;
    private $fechaCompra;
    private $fecha;
    private $hora;
    private $id_usuario;
    private $estado;

    private $objConexion;

    public function __construct(){
      $this->objConexion = Conexion::getInstance();
    }

    public function getGastos($fechaIni, $fechaFin, $idUsuarioPago = "%", $f_estado=1){
      $arrayResponse = array();

      $idUsuarioCompraType = is_string($idUsuarioPago) ? 's' : 'i';
      $f_estadoType = is_string($f_estado) ? 's' : 'i';

      $sql = "SELECT id, monto, observacion, id_usuario_pago, fechaCompra
              FROM gastosGenerales
              WHERE id_usuario_pago LIKE ?
              AND fechaCompra BETWEEN ? AND ?
              AND estado LIKE ?";

      $stmt = $this->objConexion->mysqli->prepare($sql);
      $stmt->bind_param($idUsuarioCompraType."ss".$f_estadoType, $idUsuarioPago, $fechaIni, $fechaFin, $f_estado);
      $stmt->execute();
      $stmt->bind_result($id, $monto, $observacion, $id_usuario_pago, $fechaCompra);
      if(!$stmt->errno){
        while($stmt->fetch()){
          $arrayResponse[$id] = array(
            "id"                => $id,
            "monto"             => $monto,
            "observacion"       => $observacion,
            "id_usuario_pago"  => $id_usuario_pago,
            "fechaCompra"       => $fechaCompra
          );
        }
      }else{
        throw new Exception("Error al traer gastos generales, ".$stmt->error, $stmt->errno);
      }
      $stmt->free_result();
      $stmt->close();

      return $arrayResponse;
    }

    //Agregar gasto general
    public function addGasto($monto, $detalle, $usrCompra, $fechaC){

      $fecha = date('Y-m-d');
      $hora = date('H:i:s');
      $idUser = $_SESSION['id'];

      $sql = "INSERT INTO gastosgenerales(monto, observacion, id_usuario_pago, fechaCompra, fecha, hora, id_usuario, estado)
              VALUES(?,?,?,?,?,?,?, 1)";
      $stmt = $this->objConexion->mysqli->prepare($sql);
      $stmt->bind_param('isisssi', $monto, $detalle, $usrCompra, $fechaC, $fecha, $hora, $idUser);
      $stmt->execute();
      if(!$stmt->errno){
        return 1;
      }else{
        throw new Exception("Error al agregar gasto, ".$stmt->error, $stmt->errno);
      }

    }

    public function deleteGasto($idGasto){
      $sql = "DELETE FROM gastosgenerales WHERE id = ?";
      $stmt = $this->objConexion->mysqli->prepare($sql);
      $stmt->bind_param('i', $idGasto);
      $stmt->execute();
      if(!$stmt->errno){
        return 1;
      }else{
        throw new Exception("Error al borrar gastos, ".$stmt->error, $stmt->errno);
      }
    }

    //Gastos ordenados Por usuario
    public function getResumenGastosUsuario($fechaIni, $fechaFin, $idUsuario_pago = "%", $f_estado=1){
      $arrayGastos = $this->getGastos($fechaIni, $fechaFin, $idUsuario_pago, $f_estado);

      $arrayPorUser = array();
      foreach($arrayGastos as $idGasto => $datosgasto){
        $arrayPorUser[$datosgasto["id_usuario_pago"]][$idGasto] = array(
          "id"              => $datosgasto["id"],
          "monto"           => $datosgasto["monto"],
          "observacion"     => $datosgasto["observacion"],
          "id_usuario_pago" => $datosgasto["id_usuario_pago"],
          "fechaCompra"     => $datosgasto["fechaCompra"]
        );
      }

      return $arrayPorUser;
    }


  }

?>
