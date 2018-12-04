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
    <title>Perfil usuario</title>
    <?php include '../View/Includes/header.html'; ?>

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8 mb-4">

            <!-- Perfil -->
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6 login-form-1">
                        <br>
                        <h3>Perfil de usuario</h3>

                        <?php
                        /*Cargar datos del usuario*/
                        if(isset($_SESSION['username'])){
                            $usuario = new Usuario($_SESSION['username']);
                            $datos = $usuario->buscarDatos($_SESSION['username']);
                            echo '
                            <form method="post" action="' .  $_SERVER['PHP_SELF']   .'" id="formularioPerfil" >
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" disabled="disabled" placeholder="" value="' . $_SESSION["username"] .'" />
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control" name="password" placeholder="" value="' . $datos["password"] .'" />
                            </div>
                        
                            <div class="form-group">
                                <label for="nombre">Nombre completo: </label>
                                <input name="nombre" type="text" class="form-control" placeholder="" value="' . $datos["nombre"] . '" />
                            </div>

                            <div class="form-group">
                                <label for="nombre">Rol id: </label>
                                <input name="idtipousuario" type="text" class="form-control" placeholder="" value="' . $datos["idtipousuario"] . '" disabled="disabled"/>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-info" name="modificar" value="Modificar" id="modificarUsuario"/>
                            </div>
                        </form>
                            ';
                        }
                        
                        /*Modificar datos del usuario*/
                        $usuari = new Conexion();
                        if(isset($_POST['modificar'] )) {
                            $password = $_POST['password'];
                            $nombre = $_POST['nombre'];
                                $query = "UPDATE usuarios SET username = '$_SESSION[username]', password = '$password', nombre = '$nombre' WHERE username = '$_SESSION[username]'";
                                $usuari->query($query);
                                header('location: ../View/accionesNoticia.php');
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>



</html>
