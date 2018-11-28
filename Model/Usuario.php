<?php

/*Establir la connexio*/
require_once "../Classes/Conexion.php";

class Usuario extends PDO
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
    
    public function mostrarDatos() 
    {
        return $this->username . ", " . $this->password . ", " . $this->nombre . ", " . $this->idtipousuario;
    }

    public function listar()
    {
        $conexion = new Conexion();
        $query = "SELECT * FROM usuarios"; 
        $result = $conexion->prepare($query);
        var_dump($result);
        $result->bind(":username",$username);
        $result->bind(":password",$password);
        $result->bind(":nombre",$nombre);
        $result->bind(":idtipousuario",$idtipousuario);
        $result->execute();
        var_dump($result);
        while($fila = $result->fetch_objetct("Usuario")) {
            echo $fila->mostrarDatos();
        }
        
    }


    /*relacioUsernameIdTipoUsuario*/
    /*public function __construct($username = null)
    {
        if($username != null)
        {
            $conexion = new Conexion();

            $consulta = $conexion->prepare('SELECT idtipousuario FROM usuarios WHERE username= :username');
            $consulta->bindParam(':username', $username);
            $consulta->execute();

            $registro = $consulta->fetch();

            if ($registro){
               $this->setUsername($username);
               $this->setPassword($registro['password']);
               $this->setNombre($registro['nombre']);
               $this->setIdtipousuario($registro['idtipousuario']);

               return $this;
            }


        }
        ///*Si el tipo usuari no estroba a la bd
        throw new Exception("Este tipo de usuario no se encuentra en nuestra base de datos. Not found",404);
    }*/





}