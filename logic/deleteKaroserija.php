<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            include ("../data/connection.php");
            $id = $_POST['karoserijaID'];
            $upit = "DELETE FROM karoserija WHERE karoserijaID = :id";
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