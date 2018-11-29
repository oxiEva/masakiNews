<?php

/*Establir la connexio*/
require_once "../Classes/Conexion.php";

class Noticias
{
    private $id;
    private $autor;
    private $editor;
    private $titulo;
    private $subtitulo;
    private $texto;
    private $imagen;
    private $idseccion;
    /*private $palabraClave;*/
    private $fechaCreacion;
    private $fechaModificacion;
    private $fechaPublicacion;



    const TABLA = 'noticias';

    /*Fem funció per afegir Noticia*/


    public function crearNew(){

        $conexion = new Conexion();
        $autorNoticia =$_SESSION['username'];


        if(isset($_POST['editorNoticia'])){
            $editorNoticia = $_POST['editorNoticia'];
        }else{
            $editorNoticia = "Editor por defecto";
        }

                $titulo = $_POST['titulo'];
                $subtitulo = $_POST['subtitulo'];
                $texto= $_POST['texto'];
                $imagen = $_POST['imagen'];
                $idSeccion = $_POST['idSeccion'];
        



        $consulta = $conexion->prepare(
            "INSERT INTO noticias 
              (  autor,   
              editor, 
              titulo,
              idseccion, 
              subtitulo, 
              texto,
              fechaCreacion, 
              fechaModificacion, 
              fechaPublicacion
              ) VALUES (
              :autorNoticia, 
              :editorNoticia,
              :titulo,
              :idSeccion,
              :subtitulo,
              :texto,  
              :fechaCreacion, 
              :fechaModificacion,
              :fechaPublicacion)"
        );
       // $autorNoticia = 'Rosca';
        $consulta->bindValue(':autorNoticia', $autorNoticia);
        //$editorNoticia = 'editor';
        $consulta->bindValue(':editorNoticia', $editorNoticia);
       // $titulo = 'titulo';
        $consulta->bindValue(':titulo', $titulo);
        //$idSeccion = 1;
        $consulta->bindValue(':idSeccion', $idSeccion);
       // $subtitulo = 'subtitulo';
        $consulta->bindValue(':subtitulo', $subtitulo);
        //$texto = 'dsadsadda';
        $consulta->bindValue(':texto', $texto);
        $fechaCreacion= date('y-m-d');
        $fechaModificacion = date('y-m-d');
        $fechaPublicacion = date('y-m-d');

        $consulta->bindValue(':fechaCreacion', $fechaCreacion);
        $consulta->bindValue(':fechaModificacion', $fechaModificacion);
        $consulta->bindValue(':fechaPublicacion', $fechaPublicacion);



        $consulta->execute();


    }

    /*Faig q el searchnew li passi el parametre idnoticia,haurem de validar q sigui periodista o admin */

    public function searchNew($idNoticia = null)
    {
        if($idNoticia != null){
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
            $consulta->bindParam(':id', $idNoticia);
            $consulta->execute();

            $registro = $consulta->fetch();

            if($registro){
                /*Tornem l'objecte de noticia*/
                $this->setId($idNoticia);
                $this->setAutor($registro['autorNoticia']);
                $this->setEditor($registro['editorNoticia']);
                $this->setTitulo($registro['titulo']);
                $this->setSubtitulo($registro['subtitulo']);
                $this->setTexto($registro['texto']);
                $this->setImagen($registro['imagen']);
                $this->setIdseccion($registro['idSeccion']);
                $this->setFechaCreacion($fechaCreacion = date("d-m-Y"));
                $this->setFechaModificacion($fechaModificacion= date("d-m-Y"));
                $this->setFechaPublicacion($fechaPublicacio = date('d-m-Y'));

                return $this;

            }

        }
        throw new Exception("Esta noticia no se encuentra en nuestra base de datos. Not found",404);
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
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * @param mixed $editor
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getSubtitulo()
    {
        return $this->subtitulo;
    }

    /**
     * @param mixed $subtitulo
     */
    public function setSubtitulo($subtitulo)
    {
        $this->subtitulo = $subtitulo;
    }

    /**
     * @return mixed
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param mixed $texto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * @return mixed
     */
    public function getIdseccion()
    {
        return $this->idseccion;
    }

    /**
     * @param mixed $idseccion
     */
    public function setIdseccion($idseccion)
    {
        $this->idseccion = $idseccion;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param mixed $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * @return mixed
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * @param mixed $fechaModificacion
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;
    }

    /**
     * @return mixed
     */
    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    /**
     * @param mixed $fechaPublicacion
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;
    }

    /*public function listarAllNews()
    {
        $conexion = new Conexion;
        $query = "SELECT * FROM noticias JOIN usuarios ON noticias.autor = usuarios.nombre" ;
        $result= $conexion->query($query); 
        return $result;
    }

    public function listarUserNews()
    {
        $conexion = new Conexion;
        $query = "SELECT * FROM noticias JOIN usuarios ON noticias.autor = usuarios.nombre 
            WHERE usuarios.username = '$_SESSION[username]'";
        $result= $conexion->query($query); 
        return $result;
    }*/

}