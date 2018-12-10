<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 18/11/18
 * Time: 12:04
 */

class Keywords
{

    private $id;
    private $keywords;



    public function crearKeyword(){

        $conexion = new Conexion();
        $autorNoticia =$_SESSION['username'];

        $keywords = $_POST['keyword'];

        //$consulta = $conexion->prepare("INSERT INTO keywords (id, Keywords) VALUES (NULL, :keyword)");
        $consulta = $conexion->prepare("INSERT INTO keywords (Keywords) VALUES (:keywords)");
        // $autorNoticia = 'Rosca';

        $consulta->bindValue(':keywords', $keywords);

        $consulta->execute();


    }

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
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }


}