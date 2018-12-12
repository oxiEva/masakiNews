<?php
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Classes/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Classes/BuscadorNoticias.php";
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Model/Usuario.php";
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Model/TipoUsuario.php";

$buscador = new BuscadorNoticias();
$noticiesPortada = $buscador->ShowNewsHome();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MasakiNews</title>

    <!-- Bootstrap core CSS -->
    <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/CSS/modern-business.css" rel="stylesheet">

    <!-- Mi css -->
    <link href="public/CSS/micss.css" rel="stylesheet">
</head>

<body>
<!-- Navigation -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">MasakiNews</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="View/registro.php">Registrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="View/login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class= "navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/masakiNews/index.php">Actualidad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="View/mostrarNoticiasPublicadas.php?idseccion=1">Política</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="View/mostrarNoticiasPublicadas.php?idseccion=2">Cultura</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="View/mostrarNoticiasPublicadas.php?idseccion=3">Deportes</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('View/imagenes/libros.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Feria del libro</h3>
                    <p>Empieza la 78ª feria del libro en Madrid.</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('View/imagenes/coches.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>La DGT trabaja para reducir la contaminación</h3>
                    <p>El límite será de 30 km/h en todas las ciudades</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('View/imagenes/ciclismo.jpg')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>La Vuelta ciclista</h3>
                    <p>Participantes de la Vuelta España.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->
<div class="container">

    <h1 class="my-4">Actualidad</h1>

    <!-- Marketing Icons Section -->

    <div class="row">

        <?php foreach ($noticiesPortada as $portada)

        {?>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header"><?php print $portada->getTitulo(); ?></h4>
                    <div class="card-body">
                        <img class="img-fluid rounded" src="View/imagenes/<?php echo $portada->getImagen(); ?>" alt="">
                        <h5 class="card-title"><?php print $portada->getSubtitulo(); ?></h5>
                        <p class="card-text text-muted"><?php print $portada->getAutor();?></p>
                        <p class="card-text"><?php print $portada->getTexto();?></p>

                    </div>
                    <div class="card-footer">

                        <a href="#" class="btn btn-info">Leer más</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
        <!-- /.row -->





    </div>
    <!-- /.container -->


    <?php include 'View/Includes/footer.html';?>

    <!-- Bootstrap core JavaScript -->
    <script src="public/jquery/jquery.min.js"></script>
    <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
