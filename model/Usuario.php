<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 18/11/18
 * Time: 11:47
 */

class Usuario extends EntidadBase
{
    private $id;
    private $username;
    private $password;
    private $nombre;
    private $idtipousuario;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getIdtipousuario()
    {
        return $this->idtipousuario;
    }

    /**
     * @param mixed $idtipousuario
     */
    public function setIdtipousuario($idtipousuario)
    {
        $this->idtipousuario = $idtipousuario;
    }

    public function __construct($adapter) {
        $table="usuarios";
        parent::__construct($table, $adapter);
    }


    public function save(){
        $query="INSERT INTO usuarios (id,username,password,nombre,idtipousuario)
                VALUES(NULL,
                       '".$this->id."',
                       '".$this->username."',
                       '".$this->password."',
                       '".$this->nombre."',
                       '".$this->idtipousuario."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }




}