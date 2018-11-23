<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";
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
    <div class="row">
        <div class="col-lg-8 mb-4">

        <!-- Sidebar Column -->
        <div class="col-lg-6 mb-4">
            <h3>Tus acciones</h3>
            <div class="list-group">
                <a href="tuperfil.php" class="list-group-item">Tu perfil</a>
                <a href="crearNoticia.php" class="list-group-item">Crear</a>
                <a href="modificarNoticia.php" class="list-group-item">Modificar</a>
                <a href="editarNoticia.php" class="list-group-item">Editar</a>
                <a href="publicarNoticia.php" class="list-group-item">Publicar</a>
                <a href="allUsuarios.php" class="list-group-item">Todos los usuarios</a>

            </div>
        </div>
    </div>
</div>




</html>
