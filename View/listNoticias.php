<?php
/*Establir la connexio*/
require_once $_SERVER['DOCUMENT_ROOT']. "/masakiNews/Classes/Conexion.php";

/*Reanudem la sessió*/
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de noticias</title>
        
    </head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT']. '/masakiNews/View/Includes/header.html'; ?>

    <div class="container"><br>
        
        <!-- News List -->

        <div class="mb-4" id="accordion" role="tablist">
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a href="#">Noticia #1</a>
                    </h5>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a href="#">Noticia #2</a>
                    </h5>
                </div>
            </div>
        
        </div>

    </div>

        
</body>
</html>

