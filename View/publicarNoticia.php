<?php

/*Establir la connexio*/
require_once "../Classes/Conexion.php";
require_once "../Classes/BuscadorNoticias.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Noticias.php";


/*Reanudem la sessió*/
session_start();


if(isset($_SESSION['username']) && $_GET['id'] && $_SESSION['rol'] != 2){



    $idnoticia =intval($_GET['id']);

    $buscador = new BuscadorNoticias();
    $noticia = $buscador->selectNew($idnoticia);


} else{
    header("location: noPermisoAcciones.php");
}


if(isset($_POST['publicar'])){
    $idnoticia =intval($_GET['id']);



    $buscador= new BuscadorNoticias();

    $newPublicada = $buscador->publicNew($idnoticia);

    echo "<h3 style='color: green'>Noticía publicada para nuestros lectores</h3>";
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
    <!-- New Form -->
    <div class="row">

        <div class="col-lg-8 mb-4">
            <h3>¿Quieres publicar esta noticia? <?php echo $_GET['id']?></h3>
            <form method="post" action="?id=<?php echo $idnoticia;?>" >
                <button class="btn btn-info" type="submit" name="publicar" value="publicar">
                    Publica
                </button>
                <br>
                <br>
                <br>
                <button class="btn btn-info"><a href='../View/accionesNoticia.php'></a>
                        Volver atrás
                </button>

            </form>
        </div>



</div>

</body>
</html>


