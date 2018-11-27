<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";
require_once "../Model/Usuario.php";

/*Reanudem la sessió*/
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de noticias</title>
        
    </head>
<body>
    <?php include '../View/Includes/header.html'; ?>  

    <div class="container"><br>

        <?php include '../View/Includes/adminNav.html'; ?>
        
        <!-- Users List -->

        <?php 
        if (isset($_SESSION['username']) && isset($_SESSION['rol'])){

            $usuario = new Usuario();
            $listarUsuarios = $usuario->listar();
            var_dump ($listarUsuarios);
        }
        
        ?>

        <div class="mb-4" id="accordion" role="tablist">
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a href="#">Usuario #1</a>
                    </h5>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a href="#">Usuario #2</a>
                    </h5>
                </div>
            </div>
        
        </div>

    </div>

        
</body>
</html>