<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            include ("../data/connection.php");
            $id = $_POST['markaID'];
            $upit = "DELETE FROM kolamarke WHERE markaID = :id";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":id", $id);
            $rez = $prepare -> execute();
            if($rez){
                echo json_encode($rez);
            }
        }
        catch(PDOException $e){
            http_response_code(500);
        }
    }
?>