<?php
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        try{
            include ("../data/connection.php");
            if(is_numeric($_POST['markaID'])){
                $id = $_POST['markaID'];
            }
            if(isset($_POST['textX']) AND !empty($_POST['textX'])){
                $marka = $_POST['textX'];
            }
            $upit = "UPDATE kolamarke SET marka = :marka WHERE markaID = :id";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":marka", $marka);
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