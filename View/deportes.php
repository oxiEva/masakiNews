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
        <title>Sección</title>
    </head>

    <body>

        <?php include '../View/Includes/header2.html'; ?>


        <?php include '../View/Includes/footer.html'; ?>

    </body>

</html>
