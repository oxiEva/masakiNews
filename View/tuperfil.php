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
                            $usuario = new Usuario();
                            $usuario->buscarDatos($_SESSION['username']);
                            echo "Cargar formulario con datos";
                        }
                        
                        /*Comprovem que el botó submit cliqui*/
                        $usuari = new Conexion();
                        if(isset($_POST['modificar'] )) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $nombre = $_POST['nombre'];
                            $idtipousuario = $_POST['idtipousuario'];
                            $confirmPassword = $_POST['reppassword'];

                            if ($_POST['password'] == $_POST['reppassword']) {
                                $usuari->query('INSERT INTO usuarios (username, password, nombre, idtipousuario)
                                VALUES (:username, :password, :nombre, :idtipousuario)');
                                $usuari->bind(':username', $username);
                                $usuari->bind(':password', $password);
                                $usuari->bind(':nombre', $nombre);
                                $usuari->bind(':idtipousuario', $idtipousuario);
                                $usuari->execute();

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
                                <select class="form-control" id="sel1" name="idtipousuario">
                                    <option selected disabled>Rol </option>
                                    <option label="Administrador" value="1">Administrador</option>

                                    <option label="Periodista" value="2"> Periodista</option>
                                    <option label="Editor" value="3"> Editor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="modificar" value="Modificar" id="modificarUsuario"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>



</html>
