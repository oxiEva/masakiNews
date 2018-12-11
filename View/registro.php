<?php
/*Establecer conexión*/
require_once "../Classes/Conexion.php";

/*cargar clases*/
require_once "../Model/Usuario.php";
require_once "../Model/TipoUsuario.php";

/*Reanudar sesión*/
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <?php include '../View/Includes/header.html'; ?>

</head>

<body>
    <div class="container">
        
        <!-- Registro -->
        <div class="container login-container">
            <div class="row">
                <div class="col-lg-6 mx-auto login-form-1">
                    <br><br>
                    <h3>Registrar</h3>
<?php

/*Crear un tipodeusuari*/
$tipoUsuario = new TipoUsuario();

/*Comprovar submit*/
$usuari = new Conexion();
if(isset($_POST['registrar'] )) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $idtipousuario = (int) $_POST['idtipousuario'];
    $confirmPassword = $_POST['reppassword'];

    if ($_POST['password'] == $_POST['reppassword']) {
        $usuari->query("INSERT INTO `usuarios` (`username`, `password`, `nombre`, `idtipousuario`)
 VALUES ('$username', '$password', '$nombre', '$idtipousuario')");
        echo $username . $password . '<br>' . '<h2>Usuario registrado</h2>';
        header('location: ../View/confirmacionAdmin.php');
    } else {
        echo '<h2>La contraseña no coincide</h2>';
    }
}
?>
                    <form method="post" action="<?php $_SERVER['PHP_SELF']  ?>" id="formularioRegistro" >
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" placeholder="" value="" />
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" name="password" placeholder="" value="" />
                        </div>
                        <div class="form-group">
                            <label for="reppassword">Repetir contraseña:</label>
                            <input type="password" name="reppassword" class="form-control" placeholder="" value="" />
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre completo: </label>
                            <input name="nombre" type="text" class="form-control" placeholder="" value="" />
                        </div>

                        <div class="form-group">
                            <label for="rol">Rol: </label>
                            <select class="form-control" id="sel1" name="idtipousuario">
                                <option selected disabled>Rol </option>
                                <option label="Administrador" value=1>Administrador</option>

                                <option label="Periodista" value=2> Periodista</option>
                                <option label="Editor" value=3> Editor</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-info" name="registrar" value="Registrar" id="registrar"/>
                        </div>
                    </form>
                </div>
            </div>   
        </div>
</body>

</html>
