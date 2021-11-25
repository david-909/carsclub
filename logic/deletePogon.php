<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            include ("../data/connection.php");
            $id = $_POST['pogonID'];
            $upit = "DELETE FROM pogon WHERE pogonID = :id";
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