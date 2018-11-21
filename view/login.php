<?php
/*    if (isset($contexto['mensaje'])){
        echo $contexto['mensaje'];
    }
*/?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php include '../view/Includes/header.php';
?>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">

            <!-- Login -->
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6 login-form-1">
                        <h3>Acceder</h3>
                        <form method="post" action="" id="formularioLogin" >
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" placeholder="nombreUsuario" value="" />
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Contraseña:</label>
                                <input type="password" class="form-control" name="contraseña" placeholder="Clave *" value="" />
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Entrar" />
                            </div>
                            <div class="form-group">
                                <a href="registro.php" class="Register">¿Quieres registrarte? </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
