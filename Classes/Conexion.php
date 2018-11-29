<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 18/11/18
 * Time: 12:39
 */

class Conexion extends PDO
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'oxieva';
    private $dname = 'periodico';

    /*Manejador de la BD*/
    private $dbhandling;
    /*Per recollir els errors*/
    private $error;
    /*Les sentències SQL*/
    private $stmt;

    public function __construct()
    {

        //Set DSN, la string de la connexió
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dname;
        // Set Options
        $options = array(
            PDO::ATTR_PERSISTENT   => true,
            PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
        );
        // Create new PDO
        try{
            parent::__construct ($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e){

            $this->error = $e->getMessage();

        }
    }
<<<<<<< HEAD

    /* public function query($query){
=======
/*
    public function query($query){
>>>>>>> adf9a6904eb1fafe20f763263136d827084f7afd

        $this->stmt = $this->dbhandling->prepare($query);
    }

    public function bind ($param, $value, $type = null){
        if (is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;

            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute (){
        return $this->stmt->execute();
    }

<<<<<<< HEAD
    /*Per mostrar el productes
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    } */
=======
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/
>>>>>>> adf9a6904eb1fafe20f763263136d827084f7afd


}