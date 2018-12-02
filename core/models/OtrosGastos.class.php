<?php

/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 29/9/18
 * Time: 23:38
 */


/*********
*
* OTROS GASTOS PARA SUBASTA Y COMPRADOS!
*
**********/

class OtrosGastos
{
  private $objConexion;
    public function __construct(){
        $this->objConexion = Conexion::getInstance();
    }

    //Otros Gastos autos en subasta, no comprado
    public function getOtrosGastosSubasta($idAuto, $f_estado=1){
      $arrayResponse = array();

      $f_estadoType = (is_string($f_estado)) ? 's' : 'i';

      $sql = "SELECT id, idAutoSubasta, observacion, monto
              FROM subastas_gastos_otros
              WHERE idAutoSubasta = ?
              AND estado LIKE ?";
      $stmt = $this->objConexion->mysqli->prepare($sql);
      $stmt->bind_param('i'.$f_estadoType, $idAuto, $f_estado);
      $stmt->execute();
      $stmt->bind_result($id, $idAutoSubasta, $observacion, $monto);
      if(!$stmt->errno){
        while($stmt->fetch()){
          $arrayResponse[$idAutoSubasta][$id] = array(
            "id"            => $id,
            "idAutoSubasta" => $idAutoSubasta,
            "observacion"   => $observacion,
            "monto"         => $monto
          );
        }
      }else{
        throw new Exception("Error al traer otros gastos subasta, ".$stmt->error, $stmt->errno);
      }
      $stmt->free_result();
      $stmt->close();

      return $arrayResponse;
    }
}

?>
