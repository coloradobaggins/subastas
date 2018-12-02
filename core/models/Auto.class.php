<?php
//Lo general de todo auto  va aca. Obtener conbustible por ej.

class Auto{

	private $objConexion;
	public function __construct(){
		$this->objConexion = Conexion::getInstance();
	}

  public function verQueOnda($sql){
    $this->objConexion->mysqli->prepare($sql);
  }


	


}
?>
