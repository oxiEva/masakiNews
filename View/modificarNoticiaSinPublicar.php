<?php
/**
Buscador de noticies
 */

/*Establir la connexio*/
require_once "../Classes/Conexion.php";
require_once "../Classes/BuscadorNoticias.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Noticias.php";


/*Reanudem la sessió*/
session_start();


if(isset($_SESSION['username']) && $_GET['id'] /*&& $_SESSION['rol'] != 3*/){



    $idnoticia =intval($_GET['id']);

    $buscador = new BuscadorNoticias();
    $noticia = $buscador->selectNew($idnoticia);


}/* else{
    header("location: noPermisoAcciones.php");
}*/




?>



<!DOCTYPE html>
<html>
<head>
    <?php include '../View/Includes/header.html'; ?>
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>


</head>
<body>
<div class="container">
    <?php include '../View/Includes/adminNav.html'; ?>
    <!-- New Form -->
    <div class="row">
        <ul>
            <?php
            if(isset($errores)){
                foreach ($errores as $error){
                    print "<h4>". $error . "</h4>";
                }
            }
            ?>
        </ul>
        <?php


        /*Per modificar la noticia*/
        if(isset($_POST['titulo'])){


            $idnoticia =intval($_GET['id']);


            $buscador = new BuscadorNoticias();
            $noticia = $buscador->updateAllUsersNews($idnoticia);

            $avui= date('Y-m-d');




            echo "<h3 style='color: green'>Noticia modificada con éxito</h3> <br>";
            echo "<button class='btn btn-info'> <a href='../View/accionesNoticia.php' style='color: white'>" . "Volver atrás" . "</a></button>";
        }
        ?>
        <div class="col-lg-8 mb-4">
            <h3>¿Quieres modificar esta noticia? <?php echo $_GET['id']?></h3>
            <form name="sentMessage" method="post" id="contactForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <!--No es mostra el camp idnoticia, ja q no es pot modifcar-->
                <div class="control-group form-group" style="display: none">
                    <div class="controls">
                        <label for="idnoticia">Id noticia:</label>
                        <input name="idnoticia" type="text" class="form-control" value="<?php echo $noticia->getIdnoticia()?>" required data-validation-required-message="Título">

                    </div>
                </div>
                <div class="control-group form-group">
                    <!--Botó del autor, q es mostra però no es pot tocar, canviar valor-->
                    <div class="controls">
                        <label for="titulo">Autor:</label>
                        <input name="autor" type="text" class="form-control" value="<?php echo $noticia->getAutor()?>" readonly data-validation-required-message="Título">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="titulo">Título:</label>
                        <input name="titulo" type="text" class="form-control" value="<?php echo $noticia->getTitulo()?>" required data-validation-required-message="Título">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="controls">
                        <label for="subtitulo">Subtítulo:</label>
                        <input name="subtitulo" type="text" class="form-control" id="subtitulo" value="<?php echo $noticia->getSubtitulo()?>">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="controls">
                        <label for="texto">Texto noticia:</label>
                        <textarea  rows="10" cols="100" class="form-control" id="textoNoticia" required data-validation-required-message="Texto notícia"
                                   name="texto"><?php echo $noticia->getTexto()?>

                    </textarea>
                    </div>
                </div>

                <!--Trec el camp fecha de creación pq el guardem amb $avui q és $avui = date("Y-m-d")-->
                <div class="control-group form-group">
                    <div class="controls" style="display: none">
                        <label>Fecha modificación:</label>
                        <input type="date" class="form-control" id="fecha" value="<?php echo $avui=date('Y-m-d'); ?>"
                               required data-validation-required-message="Fecha">

                    </div>
                </div>
                <!--Fem que no es pugui canviar la id de la secció-->
                <div class="control-group form-group" style="display: none">
                    <div class="form-group">
                        <label for="seleccionSeccion">Selecciona la sección</label>
                        <select name="idSeccion" class="form-control" id="idSeccion">
                            <option value="<?php echo $noticia->getIdseccion(); ?>"
                            <option value="1" label="1 actualidad">Actualidad</option>
                            <option value="2" label="2 politica">Política</option>
                            <option value="3" label="3 cultura">Cultura</option>
                            <option value="4" label="4 deportes">Deportes</option>

                        </select>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls form-control-file">
                        <label for="imagen">Selecciona una imagen</label>
                        <input type="file" name="imagen" id="imagen"  data-validation-required-message="Adjunta una imagen">
                        <?php echo $noticia->getImagen(); ?>
                    </div>
                </div>


                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-info" name="submit" id="guardarNoticia" value="actualizar">Actualizar notícia</button>

                <!--<button type="submit" class="btn btn-primary" id="modificarNoticia">Modificar notícia</button>-->
            </form>
        </div>

    </div>


</div>
<script>
    CKEDITOR.replace('texto');
</script>
<!-- /.row -->
</body>
</html>

