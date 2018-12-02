<?php

/**
 * Created by PhpStorm.
 * User: coloBaggins
 * Date: 5/9/16
 * Time: 20:15
 */
class Conexion
{
    private static $instance = null;
    public $mysqli = null;

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __clone(){}

    private function __construct()
    {
        $this->mysqli = new mysqli('localhost', 'root', '', 'subastas');
        $this->mysqli->set_charset("utf8");
        $this->mysqli->connect_errno ? die('Error al conectar a la db. Error: '.$this->mysqli->connect_error) : null;
    }
}
