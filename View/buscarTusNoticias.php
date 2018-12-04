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


    </div>
    <!-- /.row -->


</div>

<!-- /.row -->
</body>
</html>


