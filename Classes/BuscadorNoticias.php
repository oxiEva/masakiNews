<?php
/*Establir la connexio*/
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Classes/Conexion.php";

/*Carregar les classes q necessitem*/
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Model/Noticias.php";

class BuscadorNoticias
{
    public function __construct(){

    }

    public function searchNewByAutor($autor = null)
    {
        if($autor != null){
            $conexion = new Conexion();
            /*Perquè només surtin les notícies q no estan publicades*/
            $consulta = $conexion->prepare('SELECT * FROM noticias WHERE autor = :autor
            AND fechaCreacion = fechaPublicacion ORDER BY idnoticia DESC');

            //Sql= ('SELECT * FROM ' . self::TABLA . ' WHERE autor = :autor ORDER BY idnoticia DESC  LIMIT 0,25')*/
            ;
            $consulta->bindParam(':autor', $autor);
            $consulta->execute();


            $registro = $consulta->fetchAll();

            foreach ($registro as $row){
                //crear nova noticia
                $noticia = new Noticias();
                
                //assignar els valors a la noticia
                $noticia->setIdnoticia($row['idnoticia']);
                $noticia->setAutor($autor);
                $noticia->setEditor($row['editor']);
                $noticia->setTitulo($row['titulo']);
                $noticia->setSubtitulo($row['subtitulo']);
                $noticia->setTexto($row['texto']);
                $noticia->setImagen($row['imagen']);
                $noticia->setIdseccion($row['idseccion']);
                $noticia->setFechaCreacion($row['fechaCreacion']);
                $noticia->setFechaModificacion($row['fechaModificacion']);
                $noticia->setFechaPublicacion($row['fechaPublicacion']);

                //afegir la noticia a un array de noticies
                $noticiasArr[] = $noticia;

            }

            // retornar array de noticies
            return $noticiasArr;


        }
        throw new Exception("Esta noticia no se encuentra en nuestra base de datos. Not found",404);
    }

    public function selectNew($idnoticia = null){

        if($idnoticia != null){
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT * FROM noticias WHERE idnoticia = :idnoticia 
            AND fechaCreacion = fechaPublicacion');

            //Sql= ('SELECT * FROM ' . self::TABLA . ' WHERE autor = :autor ORDER BY idnoticia DESC  LIMIT 0,25')*/
            ;
            $consulta->bindParam(':idnoticia', $idnoticia);
            $consulta->execute();


            $registro = $consulta->fetchAll();



            foreach ($registro as $row){
                //crear nova noticia
                $noticia = new Noticias();

                //assignar els valors a la noticia
                $noticia->setIdnoticia($idnoticia);
                $noticia->setAutor($row['autor']);
                $noticia->setEditor($row['editor']);
                $noticia->setTitulo($row['titulo']);
                $noticia->setSubtitulo($row['subtitulo']);
                $noticia->setTexto($row['texto']);
                $noticia->setImagen($row['imagen']);
                $noticia->setIdseccion($row['idseccion']);
                $noticia->setFechaCreacion($fechaCreacion = date("d-m-Y"));
                $noticia->setFechaModificacion($fechaModificacion= date("d-m-Y"));
                $noticia->setFechaPublicacion($fechaPublicacion = date('d-m-Y'));

            }

            // retornar array de noticies
            return $noticia;


        }
        throw new Exception(" Not found",404);
    }


    public function updateNew($request)
    {
        $idnoticia =intval($_POST['idnoticia']);
        /*$idnoticia = $request['idnoticia'];*/

        $autorNoticia =$_SESSION['username'];


        if(isset($request['editor'])){
            $editorNoticia = $request['editor'];
        }else{
            $editorNoticia = "Editor por defecto";
        }

        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $texto= $_POST['texto'];
        $imagen = $_POST['imagen'];
        $idSeccion = $_POST['idSeccion'];

        $fechaModificacion = date('Y-m-d');


        if($idnoticia){
            $conexion = new Conexion();
            $consulta = $conexion->prepare("UPDATE noticias SET autor = '$autorNoticia',editor = '$editorNoticia',
            titulo = '$titulo', idseccion = '$idSeccion', subtitulo = '$subtitulo', 
            texto = '$texto',imagen = '$imagen',  fechaModificacion ='$fechaModificacion'
            WHERE noticias.idnoticia = '$idnoticia'");

            $consulta->bindParam('autor', $autorNoticia);
            $consulta->bindParam('titulo',$titulo);
            $consulta->bindParam('idseccion', $idSeccion);
            $consulta->bindParam('subtitulo',$subtitulo);
            $consulta->bindParam('texto',$texto);
            $consulta->bindParam('imagen',$imagen);
            $consulta->bindParam('fechaModificacion',$fechaModificacion);

            $consulta->execute();

            return $consulta;


        } else {
            throw new Exception("Esta noticia no se encuentra en nuestra base de datos. Not found",404);
        }

    }

    public function updateAllUsersNews($request)
    {
        $idnoticia =intval($_POST['idnoticia']);
        /*$idnoticia = $request['idnoticia'];*/

        $autorNoticia =$_POST['autor'];

        $editorNoticia = $request['editor'];

        $editorNoticia = $_SESSION['username'];

        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $texto= $_POST['texto'];
        $imagen = $_POST['imagen'];
        $idSeccion = $_POST['idSeccion'];

        $fechaModificacion = date('Y-m-d');

        if($idnoticia){
            $conexion = new Conexion();
            $consulta = $conexion->prepare("UPDATE noticias SET autor = '$autorNoticia',editor = '$editorNoticia',
            titulo = '$titulo', idseccion = '$idSeccion', subtitulo = '$subtitulo', 
            texto = '$texto', imagen = '$imagen', fechaModificacion ='$fechaModificacion'
            WHERE noticias.idnoticia = '$idnoticia'");

            $consulta->bindParam('autor', $autorNoticia);
            $consulta->bindParam('editor', $editorNoticia);
            $consulta->bindParam('titulo',$titulo);
            $consulta->bindParam('idseccion', $idSeccion);
            $consulta->bindParam('subtitulo',$subtitulo);
            $consulta->bindParam('texto',$texto);
            $consulta->bindParam('imagen',$imagen);
            $consulta->bindParam('fechaModificacion',$fechaModificacion);

            $consulta->execute();

            return $consulta;


        } else {
            throw new Exception("Esta noticia no se encuentra en nuestra base de datos. Not found",404);
        }

    }

    public function publicNew($request)
    {
        $idnoticia =intval($_POST['idnoticia']);

        $idnoticia = $request;

        $fechaPublicacion = date('Y-m-d');

        if($idnoticia){
            $conexion = new Conexion();
            $consulta = $conexion->prepare("UPDATE noticias SET fechaPublicacion ='$fechaPublicacion'
            WHERE noticias.idnoticia = '$idnoticia'");
            $consulta->bindParam('fechaPublicacion',$fechaPublicacion);



            $consulta->execute();
            return $consulta;


        } else {
            throw new Exception("Esta noticia no se encuentra en nuestra base de datos. Not found",404);
        }

    }

    /*Funció per ensenyar les noticies publicades segons secció*/
    public function showPublicNews($idseccion = null){

        $idseccion =(int) $_GET['idseccion'];


        //var_dump($idseccion); exit();
        /*var_dump($idseccion); exit();*/




        if($idseccion != null){
            $conexion = new Conexion();
           // var_dump($idseccion); exit();
            $consulta = $conexion->prepare('SELECT * FROM noticias WHERE idseccion = :idseccion
            AND fechaCreacion != fechaPublicacion LIMIT 0,5');
            /*var_dump($idseccion); exit();*/
            //var_dump($consulta); exit();

            $consulta->bindParam('idseccion', $idseccion);
            $consulta->execute();


            $registro = $consulta->fetchAll();



            foreach ($registro as $row){
                //crear nova noticia
                $publicada = new Noticias();

                //assignar els valors a la noticia
                $publicada->setIdnoticia($row['idnoticia']);
                $publicada->setAutor($row['autor']);
                $publicada->setEditor($row['editor']);
                $publicada->setTitulo($row['titulo']);
                $publicada->setSubtitulo($row['subtitulo']);
                $publicada->setTexto($row['texto']);
                $publicada->setImagen($row['imagen']);
                $publicada->setIdseccion((int)$idseccion);
                $publicada->setFechaCreacion($row['fechaCreacion']);
                $publicada->setFechaModificacion($row['fechaModificacion']);
                $publicada->setFechaPublicacion($row['fechaPublicacion']);

               //

                $publicadaArr[] = $publicada;


            }


            //var_dump($publicadaArr); exit();
            // retornar array de noticies
            return $publicadaArr;
            //var_dump($publicadaArr); exit();


       }
        throw new Exception(" Not found",404);

    }


    public function ShowNewsHome()
    {

        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM noticias WHERE fechaCreacion != fechaPublicacion LIMIT 0,6');

        $consulta->execute();

        $notPortada = $consulta->fetchAll();

        foreach ($notPortada as $row) {
            $portada = new Noticias();

            //assignar els valors a la noticia
            $portada->setIdnoticia($row['idnoticia']);
            $portada->setAutor($row['autor']);
            $portada->setEditor($row['editor']);
            $portada->setTitulo($row['titulo']);
            $portada->setSubtitulo($row['subtitulo']);
            $portada->setTexto($row['texto']);
            $portada->setImagen($row['imagen']);
            $portada->setIdseccion($row['idseccion']);
            $portada->setFechaCreacion($row['fechaCreacion']);
            $portada->setFechaModificacion($row['fechaModificacion']);
            $portada->setFechaPublicacion($row['fechaPublicacion']);

            $portadaArr[] = $portada;

        }

        return $portadaArr;
        //
        // var_dump($portadaArr); exit();

    }



}