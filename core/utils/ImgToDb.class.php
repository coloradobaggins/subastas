<?php

Class ImgToDb{
	private $id
	private $table = "web_articulos_imgs";
	private $path;
	private $alt;

	private $objConexion;

	public function __construct($img_config){
		$this->objConexion = Conexion::getInstance();
	}

	private function saveImgData(){
		$sql = "INSERT INTO ".$this->table." (id_)"
        $stmt = $this->objConexion->mysqli->prepare($sql);
        $stmt->execute();
        $stmt->
	}

	//New Image (multiple image like gallery)



	//Update Image



	//Getters
    public function __get($atributo)
    {
        if(property_exists($this, $atributo))
        {
            return $this->$atributo;
        }
        return null;
    }

    /*************************************************/
    //Setters
    public function __set($atributo, $valor)
    {
        if(property_exists($this, $atributo))
        {
            $this-> $atributo = $valor;
        }
        else
        {
            echo $atributo . " No existe";
        }
    }
}

?>