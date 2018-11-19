<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 18/11/18
 * Time: 12:39
 */

class Conexion extends PDO
{
    private $tipo_de_base = 'mysql';
    private $host = 'localhost';
    private $nombre_de_base = 'periodico';
    private $usuario = 'root';
    private $contrasena = 'oxieva';
    public function __construct() {
        //Sobreescribo el método constructor de la clase PDO.
        try{
            parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
        }catch(PDOException $e){
            echo 'Ha surgido un error y no se puede connectar con la base de datos. Mas detalles: ' . $e->getMessage();
            exit;
        }
    }


}