<?php
  class Utils{

    private $objConexion;

    public function __construct(){
      $this->objConexion = Conexion::getInstance();
    }



    public function getCombustibles(){
      $arrayResponse = array();
      $sql = "SELECT id, nombre, estado FROM autos_combustible";

      $stmt = $this->objConexion->mysqli->prepare($sql);
      $stmt->execute();
      $stmt->bind_result($id, $nombre, $estado);
      if(!$stmt->errno){
        while($stmt->fetch()){
          $arrayResponse[$id] = array(
            "id"      => $id,
            "nombre"  => $nombre
          );
        }
      }else{
        throw new Exception("Error al get combustibles, ".$stmt->error, $stmt->errno);
      }
      $stmt->free_result();
      $stmt->close();

      return $arrayResponse;
    }
  }
?>
