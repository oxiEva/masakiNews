<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php include '../View/Includes/header.html';
?>

</head>

<body>

    <!-- Page Content -->
    <div class="container">
            
        <!-- Login -->
        <div class="container login-container">
            <div class="row">
                <div class="col-lg-6 mx-auto login-form-1">
                    <br><br>
                    <h3>Acceder</h3>
                    <br>
                    <form method="post" action="../Controller/ValidarLogin.php" id="formularioLogin" >
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" placeholder="Tu nombre de usuario" value="" />
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" name="password" placeholder="Tu contraseña" value="" />
                        </div>
                        <!--<div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Recordar
                            </label>
                        </div>-->
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" name="login" value="Entrar" />
                        </div>
                        <div class="form-group">
                            <a href="registro.php" class="Register">¿Quieres registrarte? </a>
                        </div>
                    </form>
                </div>
            </div>

    </div>

</body>
</html>
