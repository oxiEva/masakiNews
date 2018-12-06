<?php
/*Incluir clases*/
require_once "../Classes/Conexion.php";
require_once "../Model/Usuario.php";

/*Iniciar sesión*/
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de usuarios</title>
        
    </head>
<body>
    <?php include '../View/Includes/header.html'; ?>  

    <div class="container"><br>

        <?php include '../View/Includes/adminNav.html'; ?>
        
        <!-- Users List -->
        <?php 
        if (isset($_SESSION['username']) && isset($_SESSION['rol'])){
            
            $usuario = new Usuario($_SESSION['username']);
            $lista = $usuario->list();

            foreach ($lista as $muestra) 
            {
            ?>
                <div class="col-lg-8 mb-4 mx-auto">
                    <div class="card h-100">
                        <div class="card-header">
                            <form action="<?php $_SERVER['PHP_SELF'] ?>">
                                <div class="form-group">
                                    <label for="username">Usuario:</label>
                                    <input type="text" class="form-control" name="username" value="<?php echo  $muestra['username'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input type="text" class="form-control" name="password" value="<?php echo  $muestra['password'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo  $muestra['nombre'] ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="idtipousuario">Rol id:</label>
                                    <input type="text" class="form-control" name="idtipousuario" value="<?php echo  $muestra['idtipousuario'] ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-info" name="modificar" value="Modificar" id="modificarUsuario"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            /*Modificar datos del usuario*/
            $usuari = new Conexion();
                if(isset($_POST['modificar'] )) {
                        $query = "UPDATE usuarios SET username = '$muestra[username]', password = '$muestra[password]', nombre = '$muestra[nombre]' WHERE username = '$muestra[username]'";
                        $usuari->query($query);
                        header('location: ../View/accionesNoticia.php');
                }
            }
        }
        
        ?>
        </div>
    </div>     
</body>
</html>