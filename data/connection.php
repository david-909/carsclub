<?php
    include_once ("cred.php");
    try{
        $con = new PDO("mysql:host=$serverName;dbname=$databaseName",$usernameBaza,$passwordBaza);
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    catch(PDOException $e){
        echo ("Greska sa bazom". $e->getMessage());
    }
?>
