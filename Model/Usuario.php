<?php

/*Establir la connexio*/
require_once "../Classes/Conexion.php";

class Usuario
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

    public function listar()
    {
        $conexion = new Conexion;
        $query = "SELECT * FROM usuarios"; 
        $result= $conexion->query($query); 
        return $result;
    }




}