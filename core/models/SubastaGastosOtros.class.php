<?php

/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 29/9/18
 * Time: 23:38
 */


/*********
*
* OTROS GASTOS PARA SUBASTA
*
**********/

class SubastaGastosOtros
{
  private $idAuto;
  private $observacion;
  private $monto;
  private $fecha;
  private $hora;
  private $id_usuario;
  private $estado;

  private $objConexion;
    public function __construct(){
        $this->objConexion = Conexion::getInstance();
    }

    //Otros Gastos autos en subasta, no comprado - agrupado por autos
    //$group= Pasar 0 para listados de autos, 0 para un auto en detalle
    public function getOtrosGastosSubasta($idAuto, $group=0, $f_estado=1){
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
          if($group==0){
            $arrayResponse[$idAutoSubasta][$id] = array(
              "id"            => $id,
              "idAutoSubasta" => $idAutoSubasta,
              "observacion"   => $observacion,
              "monto"         => $monto
            );
          }else if($group==1){
            $arrayResponse[$id] = array(
              "id"            => $id,
              "idAutoSubasta" => $idAutoSubasta,
              "observacion"   => $observacion,
              "monto"         => $monto
            );
          }

        }
      }else{
        throw new Exception("Error al traer otros gastos subasta, ".$stmt->error, $stmt->errno);
      }
      $stmt->free_result();
      $stmt->close();

      return $arrayResponse;
    }


    public function addOtrosGastoSubasta($idAutoSubasta){

      $obs = $this->observacion;
      $monto = $this->monto;


      $fechaCarga = date("Y-m-d");
      $horaCarga = date("H:i:s");
      $userCarga = $_SESSION["id"];



      $sql = "INSERT INTO subastas_gastos_otros(idAutoSubasta, observacion, monto, fecha, hora, id_usuario, estado)
                      VALUES(?,?,?,?,?,?,1)";
      $stmt = $this->objConexion->mysqli->prepare($sql);
      $stmt->bind_param('isissi', $idAutoSubasta, $obs, $monto, $fechaCarga, $horaCarga, $userCarga);
      $stmt->execute();
      if(!$stmt->errno){
        echo 1;
      }else{
        throw new Exception("Error al cargar gasto otro, ".$stmt->error, $stmt->errno);
      }
    }
}

?>
