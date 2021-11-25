<?php
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        try{
            include ("../data/connection.php");
            if(is_numeric($_POST['menjacID'])){
                $id = $_POST['menjacID'];
            }
            if(isset($_POST['textX']) AND !empty($_POST['textX'])){
                $menjac = $_POST['textX'];
            }
            $upit = "UPDATE menjac SET menjac = :menjac WHERE menjacID = :id";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":menjac", $menjac);
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