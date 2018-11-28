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
    private $fechaCreacion;
    private $fechaModificacion;
    private $fechaPublicacion;

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

    public function listarAllNews()
    {
        $conexion = new Conexion;
        $query = "SELECT * FROM noticias JOIN usuarios ON noticias.autor = usuarios.nombre" ;
        $result= $conexion->query($query);
        return $result;

        while ($fila = $result->fetch_assoc()) {
            echo "ID: " . $fila['idnoticia'] . ", Nombre: " . $fila['autor'] . ", Título: " . $fila['titulo'] . "<br>";
        }
    }

    public function listarUserNews()
    {
        $conexion = new Conexion;
        $query = "SELECT * FROM noticias JOIN usuarios ON noticias.autor = usuarios.nombre 
            WHERE usuarios.username = '$_SESSION[username]'";
        $result= $conexion->query($query);
        return $result;

        while ($fila = $result->fetch_assoc()) {
            echo "ID: " . $fila['idnoticia'] . ", Nombre: " . $fila['autor'] . ", Título: " . $fila['titulo'] . "<br>";
        }
    }
}