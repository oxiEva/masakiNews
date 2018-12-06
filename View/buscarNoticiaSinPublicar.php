<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";
require_once "../Classes/BuscadorNoticias.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Noticias.php";


/*Reanudem la sessió*/
session_start();

if(!isset($_SESSION['username']) && ($_SESSION['rol'])){


    header("location: login.php");
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
            <form name="searchForIdNew" method="post" id="searchForUsername" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                <div class="card mb-4">
                    <h5 class="card-header">Buscador news</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Username" name="autor">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit" name="buscar" value="buscar">Buscar por autor</button>
                </span>
                        </div>
                    </div>
                </div>
            </form>

            <?php
            if(isset($_SESSION['username']) && $_SESSION['rol'] !=2){

                    $buscador = new BuscadorNoticias();
                    $noticiasArr = $buscador->searchNewByAutor($_POST['autor']);
                 /*   var_dump($_SESSION['username']);
                    var_dump($_POST['autor']); exit();*/


            } else{
                header("location: noPermisoAcciones.php");
            }

            ?>


            <h3>Resultados de la búsqueda</h3>

            <?php

            foreach ($noticiasArr as $noticia) {
                ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php $idnoticia =intval($noticia->getIdnoticia()); ?>
                                <p class="card-text"><?php print $idnoticia;?></p>
                                <a href="#">
                                    <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="">
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <h2 class="card-title"> <?php print $noticia->getTitulo(); ?></h2>
                                <h3 class="card-subtitle"> <?php print $noticia->getSubtitulo(); ?></h3>
                                <p class="card-text"><?php print $noticia->getTexto(); ?></p>
                                <form method="post" action="modificarNoticiaSinPublicar.php?id=<?php echo $idnoticia;?>" >
                                    <button class="btn btn-info" type="submit" name="modificar" value="modificar">
                                        Modifica
                                    </button>
                                </form>
                                <br>

                                <form method="post" action="publicarNoticia.php?id=<?php echo $idnoticia;?>">
                                    <button class="btn btn-info" type="submit" name="publicar" value="publicar">
                                        Publica
                                     </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <?php print $noticia->getAutor(); ?>
                        <br>
                        <?php print $noticia->getFechaModificacion(); ?>

                    </div>
                </div>

                <?php
                // var_dump($noticiasArr); exit();
            }
            /* $noticiasArr = new Noticias();*/
            ?>


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


