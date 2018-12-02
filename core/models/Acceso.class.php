<?php
/**
 * Created by PhpStorm.
 * User: coloBaggins
 * Date: 5/9/16
 * Time: 22:46
 */

class Acceso
{
    private $objConexion;

    public function __construct()
    {
        $this->objConexion = Conexion::getInstance();
    }

    public function login($user, $pass, $f_estado = 1)
    {
        if(!empty($user) && !empty($pass))
        {

            $pass = $this->Encrypt($pass);

            $sql = "SELECT id, user, mail, pass, estado
                    FROM usuarios
                    WHERE user = ?
                    AND pass = ?
                    AND estado = ?";


            $stmt = $this->objConexion->mysqli->prepare($sql);
            $stmt->bind_param('ssi', $user, $pass, $f_estado);
            $stmt->execute();
            $stmt->bind_result($id, $user, $mail, $pass, $estado);
            if($stmt->fetch())
            {
                $_SESSION['id']       = $id;
                $_SESSION['user']     = $user;
                $_SESSION['mail']      = $mail;
                echo 1;
            }else{
                throw new Exception("Error, datos incorrectos. Contacte al administrador. ".$stmt->error . "error N: ".$stmt->errno, 2);
            }
            $stmt->free_result();
            $stmt->close();
        }
        else
        {
            throw new Exception('Error, datos vacios.', 3);
            exit;
        }

    }


    public function resetPassword($idUser, $newPass)
    {
        $f_estado = 1;
        //echo "pass sin encrypt: ".$newPass;
        $newPass = $this->Encrypt($newPass);
        $response = null;


        $sql = "UPDATE empresa_usuarios SET pass = ? WHERE id = ? AND estado = ?";
        //echo $sql;
        //echo " *** la nueva pass encrypt es: ".$newPass. " id: ".$idUser;
        //cho "f_estado: ".$f_estado;

        $stmt = $this->objConexion->mysqli->prepare($sql);
        $stmt->bind_param('sii', $newPass, $idUser, $f_estado);
        $stmt->execute();
        if($stmt->execute())
        {
            $response = true;
        }
        else
        {
            $response = false;
        }

        $stmt->free_result();
        $stmt->close();
        return $response;
    }

    //Este metodo deberia ir en usuario? main? helper?
    public function Encrypt($string)
    {
        $sizeof = strlen($string) - 1;
        $result = '';
        for($i=$sizeof; $i>= 0; $i--)
        {
            $result.=$string[$i];
        }
        $result = md5($result);
        return $result;
    }

    public function recuperarPass()
    {
        //Enviar verificacion al mail para que cambie la password.
    }
}
