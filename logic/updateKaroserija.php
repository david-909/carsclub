<?php
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        try{
            include ("../data/connection.php");
            if(is_numeric($_POST['karoserijaID'])){
                $id = $_POST['karoserijaID'];
            }
            if(isset($_POST['textX']) AND !empty($_POST['textX'])){
                $karoserija = $_POST['textX'];
            }
            $upit = "UPDATE karoserija SET karoserija = :karoserija WHERE karoserijaID = :id";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":karoserija", $karoserija);
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