<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Entrada en el administrador</title>
    <?php include '../View/Includes/header.php';
    ?>

</head>

<body>
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Menú administración
        <small>Acciones</small>
    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Admin</a>
        </li>
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="row">
        <div class="col-lg-8 mb-4">

        <!-- Sidebar Column -->
        <div class="col-lg-6 mb-4">
            <h3>Tus acciones</h3>
            <div class="list-group">
                <a href="crearNoticia.php" class="list-group-item">Crear</a>
                <a href="modificarNoticia.php" class="list-group-item">Modificar</a>
                <a href="editarNoticia.php" class="list-group-item">Editar</a>
                <a href="publicarNoticia.php" class="list-group-item">Publicar</a>

            </div>
        </div>
    </div>
</div>




</html>
