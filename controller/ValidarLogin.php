<?php
require_once '../core/Conectar.php';

try{

    $base = new PDO("mysql:dbname=electroTienda;host=localhost", "root", "oxieva");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM electroUsuarios WHERE usuario = :usuario AND password = :password";
    $resultat = $base->prepare($sql);

    $usuario =htmlentities(addslashes($_POST['usuario']));
    $password =htmlentities(addslashes($_POST['password']));

    $resultat->bindValue(":usuario",$usuario);
    $resultat->bindValue(":password", $password);

    $resultat->execute();

    $numRegistre = $resultat->rowCount();
    $userData = reset($resultat->fetchAll());

    if($numRegistre != 0){
        /*Si l'usuari es troba a la base d dates, creem sessió*/
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['usuarioId'] = $userData['id'];

        /*header("location: usuarisRegistrats.php");*/
        echo 'usuari registrat, passa a la botiga ';
        header('location: myShop.php');
    } else {
        /*Redirigim al mateix form*/
        /*header("location: login.php?login_fail");*/
        /*echo 'usuari no de la nostra BD';*/
        header('location: registro.php');

    }




} catch (Exception $e){
    die ("Error: " .$e->getMessage());
}