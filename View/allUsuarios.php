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
    <title>Listado de noticias</title>
        
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
            <div class="mb-4" id="accordion" role="tablist">
            <a href=""><div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h6 class="mb-0">
                        <?php echo 'Usuario: ' . $muestra['username'] . ', Contraseña: ' . $muestra['password'] .
                         ', Nombre: ' . $muestra['nombre'] . ', Rol id: ' . $muestra['idtipousuario'];?></a>
                    </h6>
                </div>
            </div></a>

            <?php
            }
        }
        ?>
        </div>
    </div>     
</body>
</html>