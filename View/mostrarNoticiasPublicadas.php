<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";
require_once "../Classes/BuscadorNoticias.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Usuario.php";
require_once "../Model/TipoUsuario.php";

//if(isset($idseccion)){
$idseccion = $_GET['idseccion'];

    $buscador = new BuscadorNoticias();
    $notPublicades = $buscador->showPublicNews($idseccion);

//var_dump($idseccion);



?>
<!DOCTYPE html>
<html>
<head>
    <title>Sección</title>
</head>

<body>

<?php include '../View/Includes/header2.html'; ?>

<!-- Page Content -->
<div class="container">


        <h3>Secció <?php echo $idseccion ;?></h3>

        <?php foreach ($notPublicades as $publicada) {?>
    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8 mb-4" style="margin-top: 30px; float: right">
            <p style=""><?php echo $publicada->getIdnoticia();?></p>
            <!-- Preview Image -->
            <img class="img-fluid rounded" src="../View/imagenes/<?php echo $publicada->getImagen(); ?>" alt="">

            <hr>

            <p><?php print $publicada->getAutor(); ?>, <?php print $publicada->getFechaPublicacion(); ?></p>

            <hr>

            <!-- Post Content -->
            <h1 class="mt-4 mb-3"><?php print $publicada->getTitulo(); ?></h1>
            <h2 class="card-title"><?php print $publicada->getSubtitulo(); ?></h2>
            <p class="lead"><?php print $publicada->getTexto(); ?></p>
        </div>

    </div>

            <?php

            }

            ?>

            <!-- Comments Form -->
       <!-- <div class="row">
            <div class="card my-12">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>



        </div>-->

    </div>


<div class="card my-12">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
        <form>
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
</div>
<?php include '../View/Includes/footer.html'; ?>

</body>

</html>