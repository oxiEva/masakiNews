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
            $consulta = $conexion->prepare('SELECT * FROM noticias WHERE autor = :autor');

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
                $noticia->setFechaCreacion($fechaCreacion = date("d-m-Y"));
                $noticia->setFechaModificacion($fechaModificacion= date("d-m-Y"));
                $noticia->setFechaPublicacion($fechaPublicacio = date('d-m-Y'));

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
        throw new Exception("Esta noticia no se encuentra en nuestra base de datos. Not found",404);
    }


    public function search()
    {
        /*L'array és buit pq no sabem quants camps tindrà*/
        $finalPost = array();
        foreach ($this->post as $key => $fieldToSearch) {
            if (!empty($fieldToSearch) && $key != 'submit') {
                $finalPost[$key] = $fieldToSearch;
            }
        }

        $sqlQuery = 'SELECT * FROM noticias WHERE autor = "' . $_SESSION['username'] . '"';



        foreach ($finalPost as $key => $fieldToSql) {
            switch ($key) {
                /*Si el camp és un string, default*/
                case 'idnoticia':
                    /*Ja el cod_parte és un int*/
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
            /*Instanciem el resultat com un nou parte*/
            $arrResult[] = new Noticias($row['autorNoticia']);
        }

        /*Preparem el resuktat per formar la taula*/
        return($this->formatResponse($arrResult));



    }

    /*Dibuixem el cos de la taula, els resultats obtinguts*/
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
    }
}