<?php
/*Establir la connexio*/
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Classes/Conexion.php";

/*Carregar les classes q necessitem*/
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Model/Usuario.php";
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Model/TipoUsuario.php";

/*Reanudem la sessió*/
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Entrada en el administrador</title>
    <?php include $_SERVER['DOCUMENT_ROOT']. '/masakiNews/View/Includes/header.html';
    ?>

</head>

<body>

<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <?php include $_SERVER['DOCUMENT_ROOT']. '/masakiNews/View/Includes/adminNav.html'; ?>
    <?php

    if(!isset($_SESSION['username'])){

        $username = $_SESSION['username'];


        header("location: login.php");
    }

    ?>
    <div class="row">
        <div>
                <br>
                <h3 style='color: red'><?php
                    echo "Hola " . $_SESSION['username'] . " Tu rol es " .  $_SESSION['rol'] .
                        " No tienes permiso para hacer esta acción, quieres hacer algo más ?" ;
                    ?></h3>
                    <br>

                <button class="btn btn-info"> <a href='../View/accionesNoticia.php' style="color:white"> Volver atrás</a></button>

        </div>
    </div>

</html>
