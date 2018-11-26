<?php
/*Establir la connexio*/
require_once "../Classes/Conexion.php";

/*Carregar les classes q necessitem*/
require_once "../Model/Usuario.php";
require_once "../Model/TipoUsuario.php";
/*Reanudem la sessió*/
session_start();


/*Comprovem que el botó submit cliqui*/
$usuari = new Conexion();
if(isset($_POST['registrar'] )) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $idtipousuaurio = $_POST['idtipousuario'];
    $confirmPassword = $_POST['reppassword'];


    if ($_POST['password'] == $_POST['reppassword']) {
        $usuari->query('INSERT INTO usuarios (username, password, nombre, idtipousuario)
 VALUES (:username, :password, :nombre, (SELECT `idtipousuario` FROM `tipousuarios` WHERE :idtipousuario))');
        $usuari->bind(':username', $username);
        $usuari->bind(':password', $password);
        $usuari->bind(':nombre', $nombre);
        $usuari->bind(':idtipousuario', $idtipousuaurio);
        $usuari->execute();

        echo $username . $password . '<br>' . '<h2>Usuario registrado</h2>';
        header('location: ../View/confirmacionAdmin.php');
    } else {
        echo '<h2>La contraseña no coincide</h2>';
    }


}