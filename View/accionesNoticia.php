<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Usuario.php";
require_once "../Model/TipoUsuario.php";

/*Reanudem la sessió*/
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Entrada en el administrador</title>
    <?php include '../View/Includes/header.html';
    ?>

</head>

<body>

<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <?php include '../View/Includes/adminNav.html'; ?>
    <?php
    
    if(!isset($_SESSION['username'])){

        $username = $_SESSION['username'];


        header("location: login.php");
    }

    ?>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <?php
            echo "<h2>Hola " . $_SESSION['username'] . " Tu rol es " .  $_SESSION['rol'] ." , qué deseas hacer?</h2>" ;

            ?>

        <!-- Sidebar Column -->
        <div class="col-lg-6 mb-4">
            <h3>Tus acciones</h3>

            <div class="list-group">
                <a href="tuperfil.php" class="list-group-item">Tu perfil de usuario</a>
                <!--Restringir Periodista i admin-->
                <a href="crearNoticia.php" class="list-group-item">Crear una noticia</a>
                <!--Restringir Periodista i admin-->
                <a href="crearPalabrasClave.php" class="list-group-item">Crear palabra clave</a>
                <!--Registringir periodista i admin-->
                <a href="buscarTusNoticias.php" class="list-group-item">Buscar tus noticias</a>
                <!--Restringir editor-->
                <a href="buscarNoticiaSinPublicar.php" class="list-group-item">Buscar noticias sin publicar</a>
                <!--<a href="modificarNoticia.php" class="list-group-item">Modificar</a>
                <a href="editarNoticia.php" class="list-group-item">Editar</a>
                <a href="publicarNoticia.php" class="list-group-item">Publicar</a>-->
                <!--Restringir admin-->
                <a href="allUsuarios.php" class="list-group-item">Todos los usuarios</a>

            </div>
        </div>
    </div>
</div>




</html>
