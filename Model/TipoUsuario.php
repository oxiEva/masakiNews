<?php
require_once '../Classes/Conexion.php';

class TipoUsuario
{

    private $id;
    private $tipoUsuarios;

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
    public function getTipoUsuarios()
    {
        return $this->tipoUsuarios;
    }

    /**
     * @param mixed $tipoUsuarios
     */
    public function setTipoUsuarios($tipoUsuarios)
    {
        $this->tipoUsuarios = $tipoUsuarios;
    }

   /* public function __construct($username = null)
    {
        if($username != null)
        {
            $conexion = new Conexion();

            $consulta = $conexion->prepare('SELECT idtipousuario FROM usuarios WHERE username= :username');
            $consulta->bindParam(':username', $username);
            $consulta->execute();

            $registro = $consulta->fetch();

            if ($registro){
                $this->getId();
                var_dump($this->getId()); exit();
                echo 'Hola';
                return $this;
            }


        }
        ///*Si el tipo usuari no estroba a la bd
        throw new Exception("Este tipo de usuario no se encuentra en nuestra base de datos. Not found",404);
    }*/


}