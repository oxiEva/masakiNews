<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 21/11/18
 * Time: 13:23
 */

class UsuariosModel extends ModeloBase
{
    private $table;

    public function __construct($adapter){
        $this->table="usuarios";
        parent::__construct($this->table, $adapter);
    }

    //Metodos de consulta
    public function getUnUsuario(){
        $query="SELECT * FROM usuarios WHERE username='mininem'";
        $usuario=$this->ejecutarSql($query);
        return $usuario;
    }

}