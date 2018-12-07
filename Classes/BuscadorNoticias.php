<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Noticias.php";

class BuscadorNoticias
{
    /*Els posts serán totes les dades recollides pel form*/
    private $post;

    public function __construct(){

    }

    public function searchNewByAutor($autor = null)
    {
        if($autor != null){
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT * FROM noticias WHERE autor = :autor ORDER BY idnoticia DESC');

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
            $consulta = $conexion->prepare('SELECT * FROM noticias WHERE idnoticia = :idnoticia');

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
                $noticia->setFechaPublicacion($fechaPublicacio = date('d-m-Y'));



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


        //$imagen = $_FILES['imagen']['name'];
       //var_dump($imagen); exit();


        /*Per pujar imatges*/
        /*Mirem els diferents tipus d'error*/
       /* if($_FILES['imagen']['error']){

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


            }

        } else {

            //echo "Has subido la imagen correctamente <br>";

            if((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error'] == UPLOAD_ERR_OK))){

                $destiRuta = "../View/imagenes/";

                move_uploaded_file($_FILES['imagen']['tmp_name'], $destiRuta . $_FILES['imagen']['name']);


                echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado en el directorio de imagenes";

            } else {

                echo "Ha habido algun error, no se ha copiado el archivo en imagenes/";
            }
        }*/

/* imagen = '$imagen',*/



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
        /*$autorNoticia =$_POST['autor'];

        $editorNoticia = $request['editor'];
        $editorNoticia = $_SESSION['username'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $texto= $_POST['texto'];
        $imagen = $_POST['imagen'];
        $idSeccion = $_POST['idSeccion'];*/

        $fechaPublicacion = date('Y-m-d');

        if($idnoticia){
            $conexion = new Conexion();
            $consulta = $conexion->prepare("UPDATE noticias SET fechaPublicacion ='$fechaPublicacion'
            WHERE noticias.idnoticia = '$idnoticia'");
            /*$consulta = $conexion->prepare("UPDATE noticias SET autor = '$autorNoticia',editor = '$editorNoticia',
            titulo = '$titulo', idseccion = '$idSeccion', subtitulo = '$subtitulo', 
            texto = '$texto', imagen = '$imagen', fechaPublicacion ='$fechaPublicacion'
            WHERE noticias.idnoticia = '$idnoticia'");*/


            /*$consulta->bindParam('autor', $autorNoticia);
            $consulta->bindParam('editor', $editorNoticia);
            $consulta->bindParam('titulo',$titulo);
            $consulta->bindParam('idseccion', $idSeccion);
            $consulta->bindParam('subtitulo',$subtitulo);
            $consulta->bindParam('texto',$texto);
            $consulta->bindParam('imagen',$imagen);*/
            $consulta->bindParam('fechaPublicacion',$fechaPublicacion);



            $consulta->execute();
            return $consulta;





        } else {
            throw new Exception("Esta noticia no se encuentra en nuestra base de datos. Not found",404);
        }

    }

    /*public function search()
    {
        $finalPost = array();
        foreach ($this->post as $key => $fieldToSearch) {
            if (!empty($fieldToSearch) && $key != 'submit') {
                $finalPost[$key] = $fieldToSearch;
            }
        }

        $sqlQuery = 'SELECT * FROM noticias WHERE autor = "' . $_SESSION['username'] . '"';



        foreach ($finalPost as $key => $fieldToSql) {
            switch ($key) {

                case 'idnoticia':

                    $sqlQuery .= ' AND ' . $key . ' = ' . $fieldToSql . ' ';
                    break;
                default:
                    $sqlQuery .= ' AND ' . $key . ' LIKE \'%' . $fieldToSql . '%\'';
                    break;

            }
        }
        $sqlQuery .= ';';

        $conexion = new Conexion();
        $result = $conexion->query($sqlQuery)->fetchAll();
        $arrResult = array();
        foreach ($result as $row) {

            $arrResult[] = new Noticias($row['autorNoticia']);
        }


        return($this->formatResponse($arrResult));



    }

    public function formatResponse($arrResult)
    {
        $tableHTML = '';

        foreach($arrResult as $notCreada){
            $tableHTML .= '<tr>';

            $tableHTML .= '<td align="center">'. $notCreada->getId() .' </td>';
            $tableHTML .= '<td align="center">'. $parte->getFecha() .' </td>';
            $tableHTML .= '<td align="center">'. $parte->getHora() .' </td>';
            $tableHTML .= '<td align="center">'. $parte->getCausa() .' </td>';
            $tableHTML .= '<td align="center">'. $parte->getTipo() .' </td>';
            $tableHTML .= '<td align="center">'. $parte->getCuerpo() .' </td>';
            $tableHTML .= '<td align="center">'. $parte->getGravedad() .' </td>';
            $tableHTML .= '<td align="center">'. $parte->getBaja() .' </td>';
            $tableHTML .= '</tr>';
        }

        $tableHTML .= '';
        return $tableHTML;
    }*/
}