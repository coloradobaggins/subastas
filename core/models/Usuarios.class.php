<?php

/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 19/08/2016
 * Time: 14:18
 */
class Usuarios
{
    private $id;
    private $user;
    private $mail;
    private $pass;
    private $nombre;
    private $estado;

    private $objConexion;
    public function __construct()
    {
        $this->objConexion = Conexion::getInstance();
    }

    public function getUsuarios()
    {
        $arrayUsuarios = array();

        $sql = "SELECT id, user, mail, nombre FROM usuarios";
        $stmt = $this->objConexion->mysqli->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($id, $user, $mail, $nombre);
        $stmt->store_result();
        if(!$stmt->errno)
        {
            while($stmt->fetch())
            {
                $arrayUsuarios[$id] = array(
                    'id'    => $id,
                    'user'  => $user,
                    'mail' => $mail,
                    'nombre'=> $nombre
                );
            }
        }else{
          throw new Exception("Error al traer usuarios, ".$stmt->error, $stmt->errno);
        }
        $stmt->free_result();
        $stmt->close();
        return $arrayUsuarios;
    }




    //Add user
    public function addUser()
    {
        $user           = $this->__get('user');
        $mail           = $this->__get('mail');
        $pass           = $this->__get('pass');
        $id_rol         = $this->__get('id_rol');
        $nombre         = $this->__get('nombre');
        $apellido       = $this->__get('apellido');
        $dni            = $this->__get('dni');
        $id_localidad   = $this->__get('id_localidad');
        $cargo          = $this->__get('cargo');

        $result = 0;



        //Encrypt pass
        $objAcceso = new Acceso();
        $pass = $objAcceso->Encrypt($pass);

        //TODO::validar mail VARS_
        if($user != '' && $mail != '' && $nombre != '' && $apellido != '' && $dni != ''){

            $objMain = new Main();
            //Validar mail repetido
            if($objMain->checkRegistro($mail, "mail", "empresa_usuarios") != 1){
                //Validar dni repetido
                if($objMain->checkRegistro($dni, "dni", "empresa_usuarios_datos") != 1){


                    /***************** TRANSACTION **********************/
                    /* Switch off auto commit to allow transactions */
                    $this->objConexion->mysqli->autocommit(false);

                    //insertar user
                    $sql = "INSERT INTO empresa_usuarios(user, mail, pass, id_rol, estado)
                            VALUES(?, ?, ?, ?, 1)";

                    $stmt = $this->objConexion->mysqli->prepare($sql);
                    $stmt->bind_param('sssi', $user, $mail, $pass, $id_rol);
                    $stmt->execute();
                    $stmt->store_result();

                    if(!$stmt->errno){
                        if($stmt->affected_rows > 0){
                            $lastID_user = $stmt->insert_id;

                            $sql2 = "INSERT INTO empresa_usuarios_datos(idUsuario, nombre, apellido, dni, id_localidad, cargo)
                                     VALUES(?, ?, ?, ?, ?, ?)";
                            $stmt2 = $this->objConexion->mysqli->prepare($sql2);
                            $stmt2->bind_param('issiis', $lastID_user, $nombre, $apellido, $dni, $id_localidad, $cargo);
                            $stmt2->execute();
                            $stmt2->store_result();

                            if($stmt2->affected_rows > 0){

                                $this->objConexion->mysqli->commit();
                                $result = 1;

                            }else{
                                $this->objConexion->mysqli->rollback();
                                throw new Exception("Error al insertar datos de usuario a la db (transaccion)");
                            }


                        }else{
                            $this->objConexion->mysqli->rollback();
                            throw new Exception("Error al insertar usuario (transaccion)");
                        }
                    }else{
                        throw new Exception("Error en la consulta, ".$stmt->error, $stmt->errno);
                    }

                }else{
                    throw new Exception("Ese dni ya existe en la base de datos. Indique otro", 1);
                }
            }else{
                throw new Exception("Ese mail ya existe en la base de datos. Indique otro", 2);
            }

        }else{
            throw new Exception("User, mail, nombre, apellido y dni no pueden ser vacio.", 3);
        }

        return $result;
    }






    //******************************************************//
    //              Access Modifiers                        //
    /********************************************************/
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

    public function setDatos($arrayDatos=array()){
        foreach($arrayDatos as $atributo => $valor){
            $this->__set($atributo, $valor);
        }
    }

}
