<?php
require_once '../model/Usuario.php';
require_once '../controller/RegistrarUsuario.php';

/*Reanudem la sessió*/
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <?php include '../view/Includes/header.php';
    ?>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">

            <!-- Registro -->
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6 login-form-1">
                        <h3>Registrar</h3>

                        <form method="post" action="<?php $helper->url("usuarios","crear") ?>" id="formularioRegistro" >
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" placeholder="" value="" />
                            </div>
                            <div class="form-group">
                                <label for="contraseña">Contraseña:</label>
                                <input type="password" class="form-control" name="contraseña" placeholder="" value="" />
                            </div>
                            <div class="form-group">
                                <label for="repcontraseña">Repetir contraseña:</label>
                                <input type="password" name="repcontraseña" class="form-control" placeholder="" value="" />
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre completo: </label>
                                <input name="nombre" type="text" class="form-control" placeholder="" value="" />
                            </div>

                            <div class="form-group">
                                <select class="form-control" id="sel1" name="rol">
                                    <option selected disabled>Rol </option>
                                    <option label="Administrador">Administrador</option>
                                    <option label="Periodista">Periodista</option>
                                    <option label="Editor">Editor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="registrar" value="Registrar" id="registrar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!--<script>

         $("#formularioRegistro").validate({

            rules:
            {
                password: {
                required: true,
                minlength: 4,
                maxlength: 20
                },
                cpassword: {
                required: true,
                equalTo: '#password'
                },
            },

            messages:
            {
                password:{
                required: "Porfavor introduzca una clave",
                minlength: "La clave debe tener un almenos 8 caracteres"
                },
                cpassword:{
                required: "Vuelva a introducir su clave",
                equalTo: "Las claves no coinciden !"
                },
            },
            
        })

        </script>-->
</body>



</html>
