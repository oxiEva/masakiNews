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


        <h1 class="my-4"><?php if ($idseccion == 1) {
                echo "Política";
            } elseif ($idseccion == 2) {
                echo "Cultura";
            } else {
                echo "Deportes";
            };?>
        </h1>

        <?php foreach ($notPublicades as $publicada) {?>
    <div class="my-4">
        <div class="card h-100">
            <!-- Noticia -->
            <div>
                <p class="text-right"><?php echo $publicada->getIdnoticia();?></p>
                <!-- Imagen -->
                <img class="img-fluid rounded" src="../View/imagenes/<?php echo $publicada->getImagen(); ?>" alt="">

                <!-- Título-->
                <h1 class="card-title"><?php print $publicada->getTitulo(); ?></h1>
                <h2 class="card-title"><?php print $publicada->getSubtitulo(); ?></h2>

                <!-- Autor -->
                <p class="card-footer text-right"><?php print $publicada->getAutor(); ?>, <?php print $publicada->getFechaPublicacion(); ?></p>
                
                <!-- Texto -->
                <p class="lead"><?php print $publicada->getTexto(); ?></p>
            </div>

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