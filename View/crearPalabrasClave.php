<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";
require_once "../Classes/BuscadorNoticias.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Keywords.php";


/*Reanudem la sessió*/
session_start();


if($_SESSION['rol'] != 3){

    if(isset($_POST['guardarKeyword'])){

        $novaKeyword= new Keywords();
        $novaKeyword->crearKeyword();
        $novaKeyword = $_POST['keyword'];

        echo "<h3 style='color: green'> Nueva palabra clave subida en la base de datos con éxito</h3>" . "<br>";
    }

} else {
    header("location: noPermisoAcciones.php");
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
            <h3>Añadir una palabra clave por <?php echo $_SESSION['username']?></h3>
            <form name="sentMessage" method="post" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="control-group form-group">
                    <div class="controls">
                        <label for="keyword">Palabra clave:</label>
                        <input name="keyword" type="text" class="form-control" id="titulo" required data-validation-required-message="Título">
                        <p class="help-block"></p>
                    </div>
                </div>

                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" name="guardarKeyword" class="btn btn-info" id="guardarNoticia" value="guardar">Guardar palabra clave</button>

            </form>
        </div>

    </div>
</div>

</body>
</html>

