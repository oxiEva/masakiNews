<?php

/*Establir la connexio*/
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Classes/Conexion.php";

class Noticias
{
    private $idnoticia;
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
        $imagen = $_FILES['imagen']['name'];
        /*$imagen =$_POST['imagen'];*/
        $idSeccion = $_POST['idSeccion'];
        $fechaCreacion= date('Y-m-d');
        $fechaModificacion = date('Y-m-d');
        $fechaPublicacion = date('Y-m-d');

        /*Per pujar imatges*/
        /*Mirem els diferents tipus d'error*/
        if($_FILES['imagen']['error']){

            switch ($_FILES['imagen']['error']){

                case 1: //Error excés de tamany
                    echo "Has superado el tamaño permitido";
                    break;

                case 2: //Error tamany arxiu marcat des del formulari amb l'input amagat
                    echo "Has superado el tamaño permitido por el formulario";
                    break;

                case 3: //Error fitxer pujat parcialment
                    echo "Error fichero subido parcialment, fichero corrupto";
                    break;

               /* case 4: //Error no sha pujat cap fitxer
                    echo "Error no se ha subido ningun fichero";
                    break;*/

            }

        } else {

            //echo "Has subido la imagen correctamente <br>";

            if((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error'] == UPLOAD_ERR_OK))){

                /*Creem una carpeta on desarem les imatges*/
                $destiRuta = "../View/imagenes/";

                move_uploaded_file($_FILES['imagen']['tmp_name'], $destiRuta . $_FILES['imagen']['name']);


                echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado en el directorio de imagenes";

            } else {

                echo "Ha habido algun error, no se ha copiado el archivo en imagenes/";
            }
        }







        $consulta = $conexion->prepare(
            "INSERT INTO noticias 
              (autor,   
              editor, 
              titulo,
              idseccion, 
              subtitulo, 
              texto,
              imagen,
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
              :imagen, 
              :fechaCreacion, 
              :fechaModificacion,
              :fechaPublicacion)"
        );
       // $autorNoticia = 'Rosca';
        //$consulta->bindValue(':idnoticia', $idnoticia);
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

        $consulta->bindValue(':imagen', $imagen);


        $consulta->bindValue(':fechaCreacion', $fechaCreacion);
        $consulta->bindValue(':fechaModificacion', $fechaModificacion);
        $consulta->bindValue(':fechaPublicacion', $fechaPublicacion);



        $consulta->execute();

        $lastId = $conexion->lastInsertId();

        return $lastId;
        //var_dump($lastId); exit();


    }



    /**
     * @return mixed
     */
    public function getIdnoticia()
    {
        return $this->idnoticia;
    }

    /**
     * @param mixed $idnoticia
     */
    public function setIdnoticia($idnoticia)
    {
        $this->idnoticia = $idnoticia;
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

        while ($fila = $result->fetch_assoc()) {
            echo "ID: " . $fila['idnoticia'] . ", Nombre: " . $fila['autor'] .
            ", Título: " . $fila['titulo'] . "<br>";
        }
    }

    public function listarUserNews()
    {
        $conexion = new Conexion;
        $query = "SELECT * FROM noticias JOIN usuarios ON noticias.autor = usuarios.nombre 
            WHERE usuarios.username = '$_SESSION[username]'";
        $result = $conexion->query($query);
        return $result;
    }

        while ($fila = $result->fetch_assoc()) {
            echo "ID: " . $fila['idnoticia'] . ", Nombre: " . $fila['autor'] .
            ", Título: " . $fila['titulo'] . "<br>";
        }
    }*/
}