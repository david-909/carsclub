<?php session_start();
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            include ("../data/connection.php");
            global $con;
            $odgovorID = $_POST['odg'];
            $username = $_SESSION['username'];
            $upit = "UPDATE odgovori SET glasovi = glasovi + 1 WHERE odgovorID = :odgovorID";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":odgovorID", $odgovorID);
            $prepare -> execute();

            $upit1 = "UPDATE users SET glasao = 1 WHERE username = :username";
            $prepared = $con -> prepare($upit1);
            $prepared -> bindParam(":username", $username);
            $rez = $prepared -> execute();
            if($rez){
                echo json_encode($rez);
            }
        }
        catch(PDOException $e){
            http_response_code(500);
            echo $e->getMessage();
        }
    }
?>