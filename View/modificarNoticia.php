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


if(isset($_SESSION['username']) && $_GET['id'] && $_SESSION['rol'] != 3){

    $idnoticia =intval($_GET['id']);

    $buscador = new BuscadorNoticias();
    $noticia = $buscador->selectNew($idnoticia);


    echo "<a href='../View/accionesNoticia.php'  class='register'>" . "Volver atrás" . "</a>";

} else{
    header("location: noPermisoAcciones.php");
}


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
        <div class="col-lg-8 mb-4">
            <h3>¿Quieres modificar esta noticia? <?php echo $_GET['id']?></h3>
            <form name="sentMessage" method="post" id="contactForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
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

                <!-- Trec el camp fecha de creación pq el guardem amb $avui q és $avui = date("Y-m-d")
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Fecha:</label>
                        <input type="date" class="form-control" id="fecha" required data-validation-required-message="Fecha">

                    </div>
                </div>-->

                <div class="control-group form-group">
                    <div class="form-group">
                        <label for="seleccionSeccion">Selecciona la sección</label>
                        <select name="idSeccion" class="form-control" id="idSeccion">
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
                    </div>
                </div>


                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary" id="guardarNoticia" value="actualizar">Actualizar notícia</button>

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

