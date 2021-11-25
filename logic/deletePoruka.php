<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include ("../data/connection.php");
        global $con;
        $id = $_POST['porukaID'];

        $upit = "DELETE FROM poruka WHERE porukaID = :id";
        $prepare = $con -> prepare($upit);
        $prepare -> bindParam(":id", $id);
        $rez = $prepare -> execute();

        echo json_encode($rez);
    }
?>