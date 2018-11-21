<?php
/*Establir la connexio*/
require_once "../model/Usuario.php";
require_once "../core/Conectar.php";

/*Reanudem la sessió*/
session_start();

/*Comprovem que el botó submit cliqui*/

$usuari = new Conectar();
if(isset($_POST['registrar'] )){
    $username = $_POST['username'];
    $password = $_POST['contraseña'];
    $nombre = $_POST['nombre'];
    $idtipousuaurio = $_POST['rol'];
    $confirmPassword = $_POST['repcontraseña'];

    if($_POST['contraseña'] == $_POST['repcontraseña']){
        $usuari->query('INSERT INTO usuarios (username, password, nombre, idtipousuario)
 VALUES (:username, :password, :nombre, :idtipousuario)');
        $usuari->bind(':username', $username);
        $usuari->bind(':password', $password);
        $usuari->bind(':nombre', $nombre);
        $usuari->bind(':idtipousuario', $idtipousuaurio);
        $usuari->execute();

        echo $username . $password . '<br>' . '<h2>Usuario registrado</h2>';
        /*header('location: ../inici.php');*/

    } else {

        echo '<h2>La contraseña no coincide</h2>';
    }


}