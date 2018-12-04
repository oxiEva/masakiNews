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
            <div class="mb-4" id="accordion" role="tablist">
            <a href=""><div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <p class="mb-0">
                        <b>Usuario: </b><?php echo  $muestra['username'] ?>
                        <b>Contraseña: </b><?php echo  $muestra['password'] ?>
                        <b>Nombre: </b><?php echo  $muestra['nombre'] ?>
                        <b>Rol: </b><?php echo  $muestra['idtipousuario'] ?>
                        <?php 
                            if ((int)($muestra['idtipousuario'] == 1)){
                                echo 'Administrador';
                            }elseif((int)($muestra['idtipousuario'] == 2)){
                                echo 'Periodista';
                            }else{
                                echo 'Editor';
                            }
                        ?>
                    </p>
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