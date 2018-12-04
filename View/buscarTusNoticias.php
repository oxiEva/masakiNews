<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";
require_once "../Classes/BuscadorNoticias.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Noticias.php";


/*Reanudem la sessió*/
session_start();

if(!isset($_SESSION['username'])){


    header("location: login.php");
}

/*$_POST['autor'] = $_SESSION['username'];*/
if(isset($_SESSION['username']) && $_SESSION['rol'] != 3){

    $buscador = new BuscadorNoticias();
    $noticiasArr = $buscador->searchNewByAutor($_SESSION['username']);

} else {
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
    <div class="row">
        <div class="col-lg-12 mb-4">


            <!-- Search Widget -->
            <!--<form name="searchForIdNew" method="post" id="searchForUsername" action="<?php /*echo htmlspecialchars($_SERVER['PHP_SELF']);*/?>">

                <div class="card mb-4">
                    <h5 class="card-header">Buscador news</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Username" name="autor">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit" name="buscar" value="buscar">Buscar</button>
                </span>
                        </div>
                    </div>
                </div>
            </form>-->

            <h3>Resultados de la búsqueda</h3>

            <?php

            foreach ($noticiasArr as $noticia) {
                //$idnoticia =intval($noticia->getIdnoticia());

                //var_dump($noticiasArr); exit();

                ?>            <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php $idnoticia =intval($noticia->getIdnoticia());


                               // var_dump($_SESSION['imprimirNew']); exit();
                                //var_dump($idnoticia); exit()
                                ?>
                                <p class="card-text"><?php print $idnoticia;?></p>
                                <a href="#">
                                    <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="">
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="card-title"> <?php print $noticia->getTitulo(); ?></h2>
                                <h3 class="card-subtitle"> <?php print $noticia->getSubtitulo(); ?></h3>
                                <p class="card-text"><?php print $noticia->getTexto(); ?></p>
<!--Provant d fer un formulari per poder modificar cada noticia-->
                                <form method="post" action="modificarNoticia.php?id=<?php echo $idnoticia;?>" >

                                    <input type="submit" class="btn btn-primary" value="Modificar" name="modificar">
                                   <!-- <a href="modificarNoticia.php?id=<?php /*echo $idnoticia;*/?>" class="btn btn-primary">Modifica <?php /**/?></a>-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <?php print $noticia->getAutor(); ?>
                        <br>
                        <?php print $noticia->getFechaCreacion(); ?>

                    </div>
                </div>

                <?php
                // var_dump($noticiasArr); exit();
            }
            /* $noticiasArr = new Noticias();*/
            ?>
            <!-- Blog Post -->

        </div>
        <?php
/*        if(isset($_POST['submit']) && $_POST['submit'] == 'modificar'){

            $descarregarNew = new Noticias();

            $descarregarNew->updateNew($_POST);
            echo "<h4>Parte modificado con éxito</h4>";

        }
        */?>

        <?php
        if (isset($descarregarNew) && $descarregarNew)
        ?>
        <div class="col-lg-8 mb-4">
            <h3>¿Quieres modificar esta noticia? <?php /*echo $_SESSION['username']*/?></h3>
            <form name="sentMessage" method="post" id="contactForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="titulo">Título:</label>
                        <input name="titulo" type="text" class="form-control" id="titulo"
                               value="<?php echo $descarregarNew->getTitulo();?>" required data-validation-required-message="Título">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="controls">
                        <label for="subtitulo">Subtítulo:</label>
                        <input name="subtitulo" type="text" class="form-control" id="subtitulo" required data-validation-required-message="Subtítulo">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div class="control-group form-group">
                    <div class="controls">
                        <label for="texto">Texto noticia:</label>
                        <textarea  rows="10" cols="100" class="form-control" id="textoNoticia" required data-validation-required-message="Texto notícia"
                                   name="texto">

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
                <button type="submit" class="btn btn-primary" id="guardarNoticia" value="guardar">Guardar notícia</button>

                <!--<button type="submit" class="btn btn-primary" id="modificarNoticia">Modificar notícia</button>-->
            </form>
        </div>

    </div>

    </div>
    <!-- /.row -->


</div>

<script>
    CKEDITOR.replace('editor1');
</script>
<!-- /.row -->
</body>
</html>


