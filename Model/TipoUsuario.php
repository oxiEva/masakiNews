<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 18/11/18
 * Time: 11:54
 */

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

   /* public function rolCrear($id){
        switch ($id){
            case 1:
                $this->setTipoUsuarios('ADMINISTRADOR');
                break;

            case 2:
                $this->setTipoUsuarios('PERIODISTA');
                break;

            case 3:
                $this->setTipoUsuarios('EDITOR');
                break;

        }
    }*/

}