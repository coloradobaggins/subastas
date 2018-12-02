<?php

/**
 * Created by PhpStorm.
 * User: coloBaggins
 * Date: 5/9/16
 * Time: 20:23
 */
class Main
{
    protected $objConexion;
    public function __construct()
    {
        $this->objConexion = Conexion::getInstance();
    }

    public static function makeErrorExceptionArrayResponse($errorCode, $errorMessage){
        $arrayResponse = array(
            "status"        => "error",
            "errorCode"     => $errorCode,
            "errorMessage"  => $errorMessage
        );
        return $arrayResponse;
    }

    public function getSecciones($f_estado = 1)
    {
        $arraySecciones = array();
        $sql = "SELECT id, seccion FROM web_secciones WHERE estado = ?";
        $stmt = $this->objConexion->mysqli->prepare($sql);
        $stmt->bind_param('i', $f_estado);
        $stmt->execute();
        $stmt->bind_result($id, $seccion);
        if(!$stmt->errno)
        {
            while($stmt->fetch())
            {
                $arraySecciones[$id] = array(
                    "id"        => $id,
                    "seccion"   => $seccion
                );
            }
        }
        return $arraySecciones;
    }

    public function getMetatags($f_estado=1, $f_idSeccion)
    {
        $arrayMetatag = array();
        $sql = "SELECT id, id_seccion, metatag
                FROM web_metatags
                WHERE estado = ?
                AND id_seccion = ?";
        $stmt = $this->objConexion->mysqli->prepare($sql);
        $stmt->bind_param('ii', $f_estado, $f_idSeccion);
        $stmt->execute();
        $stmt->bind_result($id, $id_seccion, $metatag);
        if(!$stmt->errno)
        {
            while($stmt->fetch())
            {
                $arrayMetatag[$id] = array(
                    "id"        => $id,
                    "id_seccion"=> $id_seccion,
                    "metatag"   => $metatag
                );
            }
        }
        return $arrayMetatag;
    }

   

    public function getProvincias(){
        $arrayResponse =  array();

        try{
            $sql = "SELECT idProvincia, nombre FROM provincias";
            $stmt = $this->objConexion->mysqli->prepare($sql);
            $stmt->execute();
            $stmt->bind_result($idProvincia, $nombre);
            while($stmt->fetch()){
                $arrayResponse[$idProvincia] = array(
                    "idProvincia"       => $idProvincia,
                    "nombre"            => $nombre
                );
            }

        }catch(Exception $e){
            $arrayResponse = Main::makeErrorExceptionArrayResponse($e->getCode(), $e->getMessage());
        }

        return $arrayResponse;
    }


    public function getLocalidadesByProv($idProv){
        $arrayResponse = array();

        try{
            if($idProv != ''){
                $sql = "SELECT idLocalidad, id_provincia, localidad FROM localidades WHERE id_provincia = ?";
                $stmt = $this->objConexion->mysqli->prepare($sql);
                $stmt->bind_param('i', $idProv);
                $stmt->execute();
                $stmt->bind_result($idLocalidad, $id_provincia, $localidad);
                if(!$stmt->errno){
                    while($stmt->fetch()){
                        $arrayResponse[$idLocalidad] = array(
                            "idLocalidad"       => $idLocalidad,
                            "id_provincia"      => $id_provincia,
                            "localidad"         => $localidad
                        );
                    }
                }else{
                    throw new Exception("Error en la consulta ".$stmt->error, $stmt->errno);
                }
            }else{
                throw new Exception("Error, idProv no puede ser vacio", 2);
            }



        }catch(Exception $e){
            $arrayResponse = Main::makeErrorExceptionArrayResponse($e->getCode(), $e->getMessage());
        }

        return $arrayResponse;
    }

    public function getLocalidad($idLocalidad){
        $arrayResponse = array();
        $sql = "SELECT idLocalidad, id_provincia, localidad FROM localidades WHERE idLocalidad = ?";
        $stmt = $this->objConexion->mysqli->prepare($sql);
        $stmt->bind_param('i', $idLocalidad);
        $stmt->execute();
        $stmt->bind_result($idLocalidad, $id_provincia, $localidad);
        if(!$stmt->errno){
            $stmt->fetch();
            $arrayResponse[$idLocalidad] = array(
                "idLocalidad"   => $idLocalidad,
                "id_provincia"  => $id_provincia,
                "localidad"     => $localidad
            );
            
        }else{
            throw new Exception("Error en la consulta al buscar localidad, ".$stmt->error, $stmt->errno);
        }
        return $arrayResponse;
    }


    /**
     * Check si dato existe en la db.
     * response = 1 -> existe || = 0 -> No existe
     *
     * @param $valor
     * @param $campo
     * @param $tabla
     * @return int
     * @throws Exception
     */
    public function checkRegistro($valor, $campo, $tabla)
    {
        $response = 0;
        $valorType = is_string($valor) ? 's' : 'i';
        $sql = "SELECT $campo FROM $tabla WHERE $campo = ?";
        $stmt = $this->objConexion->mysqli->prepare($sql);
        $stmt->bind_param($valorType, $valor);
        $stmt->execute();
        $stmt->store_result();
        if(!$stmt->errno){
            if($stmt->num_rows > 0){ $response = 1; }else{ $response = 0; }
        }else{
            throw new Exception("Error en la consulta al checkear registro, ".$stmt->error, $stmt->errno);
        }
        $stmt->free_result();
        $stmt->close();
        return $response;
    }


    /**
     * Acortar descripciones
     * @param $string
     * @param int $limit
     * @param string $separator
     * @return string
     */
    public function cutString($string, $limit = 200, $separator=" ... <a href='#'>Seguir leyendo</a>")
    {
        // strip tags to avoid breaking any html
        $string = strip_tags($string);

        if (strlen($string) > $limit) {

            // truncate string
            $stringCut = substr($string, 0, $limit);

            // make sure it ends in a word so assassinate doesn't become ass...
            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).$separator;
        }
        return $string;
    }

}