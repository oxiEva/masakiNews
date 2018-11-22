<?php
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

    if($numRegistre != 0){
        /*Si l'usuari es troba a la base d dates, creem sessió*/
        session_start();
        $_SESSION['username'] = $_POST['password'];
        header("location: ../View/crearNoticia.php");
    } else {

        /*Redirigim al mateix form*/
        header("location: ../View/login.php");


        echo "<h2>Usuario no registrado</h2>";
    }




} catch (Exception $e){
    die ("Error: " .$e->getMessage());
}