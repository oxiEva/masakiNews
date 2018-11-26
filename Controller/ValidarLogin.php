<?php
require_once '../Classes/Conexion.php';
try{

    $base = new PDO("mysql:dbname=periodico;host=localhost", "root", "oxieva");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM usuarios WHERE username= :username AND password= :password";
    $resultat = $base->prepare($sql);

    $username =htmlentities(addslashes($_POST['username']));
    $password =htmlentities(addslashes($_POST['password']));

    $resultat->bindValue(":username",$username);
    $resultat->bindValue(":password", $password);

    $resultat->execute();

    $numRegistre = $resultat->rowCount();
    $userData = reset($resultat->fetchAll());

    if($numRegistre != 0){
        /*Si l'usuari es troba a la base d dates, creem sessió*/
        session_start();
        $_SESSION['username'] = $_POST['username'];
       /* $_SESSION['password'] = $_POST['password'];*/


        $_SESSION['rol'] = ($userData['idtipousuario']);

        /*Per fer que el idtipoUsuari sigui un integer*/
        $numTipoRol = (int)($userData['idtipousuario']);

        /*var_dump($numTipoRol); exit();*/

        header("location: ../View/accionesNoticia.php");
    } else {

        /*Redirigim al mateix form*/
        header("location: ../View/registro.php");
        /*Tirar un missatge abansd que login incorrecte*/

        echo "<h2>Usuario no registrado</h2>";
    }




} catch (Exception $e){
    die ("Error: " .$e->getMessage());
}