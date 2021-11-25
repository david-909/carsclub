<?php
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            include ("../data/connection.php");
            global $con;
            $id = $_POST['kolaID'];
    
            $upit = "DELETE FROM kola WHERE kolaID = :id";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":id", $id);
            $rez = $prepare -> execute();
    
            echo json_encode($rez);
        }
        catch (PDOException $e){
            http_response_code(500);
        }
        
    }
?>