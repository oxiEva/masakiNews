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
         
        if (isset($_SESSION['username']) && $_SESSION['rol'] == 1){
            
            $usuario = new Usuario($_SESSION['username']);
            $lista = $usuario->list();

            foreach ($lista as $muestra) {
                ?>
                <div class="col-lg-8 mb-4 mx-auto">
                    <div class="card h-100">
                        <div class="card-header">
                            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
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
                                    <input type="submit" class="btn btn-info" name="eliminar" value="Eliminar" id="eliminarUsuario"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            <?php
            /*Modificar datos del usuario*/
            $usuari = new Conexion();
                if (isset($_POST['modificar'])) {
                    $password = $_POST['password'];
                    $nombre = $_POST['name'];
                    $idtipousuario = (int) $_POST['idtipousuario'];

                    $query = "UPDATE usuarios SET username = '$muestra[username]', password = '$password', 
                    nombre = '$nombre', idtipousuario = '$idtipousuario' WHERE username = '$_POST[username]'";
                    $usuari->query($query);
                    echo "usuario modificado correctamente";
                    header('location: ../View/accionesNoticia.php');
                }
            
            /*Eliminar usuario*/
                if (isset($_POST['eliminar'])) {
                    $username = $_POST['username'];

                    $query = "DELETE FROM usuarios WHERE username = '$username' ";
                    $usuari->query($query);
                    echo "usuario eliminado correctamente";
                    header('location: ../View/accionesNoticia.php');
                }
            }
        } else {
            header("location: noPermisoAcciones.php");
        }
        
        ?>
        </div>
    </div>     
</body>
</html>