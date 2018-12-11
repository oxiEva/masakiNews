<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 18/11/18
 * Time: 12:04
 */

class Keywords
{

    private $idKeyword;
    private $Keywords;



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

    public function selectKeyword(){
        /*$msqli = new Conexion();

        $query = $msqli->query("SELECT * FROM keywords");*/
        $conexion = new Conexion();
        $consulta = $conexion->prepare("SELECT * FROM keywords");
        //var_dump($consulta); exit();

        $consulta->execute();

        //$registro = $consulta->fetchAll();

        while ($registro = $consulta->fetch()){
          //  var_dump($registro); exit();
            echo '<option value ="' . $registro['idKeyword'] . '"> '. utf8_encode ($registro['Keywords']) .'</option>';



        }

        return $registro;


    }

    public function saveKeywordNew($idNoticia = false, $keyword = false)
    {

        if (!$idNoticia || !$keyword) {
            return false;
        }


        $conexion = new Conexion();
        $consulta = $conexion->prepare("INSERT INTO keywordsnoticia (idnoticia, idkeyword) VALUES 
        (".$idNoticia.", ".$keyword.")");


  //      $consulta->bindValue(':idnoticia', (int)$idNoticia);
   //     $consulta->bindValue(':idkeyword', (int)$keyword);
        //  var_dump($consulta); exit();

        $consulta->execute();





    }

    /**
     * @return mixed
     */
    public function getIdKeyword()
    {
        return $this->idKeyword;
    }

    /**
     * @param mixed $idKeyword
     */
    public function setIdKeyword($idKeyword)
    {
        $this->idKeyword = $idKeyword;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->Keywords;
    }

    /**
     * @param mixed $Keywords
     */
    public function setKeywords($Keywords)
    {
        $this->Keywords = $Keywords;
    }




}