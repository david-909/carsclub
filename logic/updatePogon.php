<?php
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        try{
            include ("../data/connection.php");
            if(is_numeric($_POST['pogonID'])){
                $id = $_POST['pogonID'];
            }
            if(isset($_POST['textX']) AND !empty($_POST['textX'])){
                $pogon = $_POST['textX'];
            }
            $upit = "UPDATE pogon SET pogon = :pogon WHERE pogonID = :id";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":pogon", $pogon);
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