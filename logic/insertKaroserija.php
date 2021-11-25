<?php
    define("regexKaroserija", "/^[A-Z][A-Za-z]+$/");
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include ("../data/connection.php");       
        try{
            if(isset($_POST['karoserijaX']) OR !empty($_POST['karoserijaX']) OR !preg_match(regexKaroserija, $_POST['karoserijaX'])){
                $karoserija = $_POST['karoserijaX'];
            }
            $upit = "INSERT INTO karoserija values(null, :karoserija)";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":karoserija", $karoserija);
            $rez = $prepare -> execute();
            if($rez){
                http_response_code(201);
                echo json_encode(["poruka"=>"Unoseno u bazu"]);
            }
            else{
                echo json_encode(["poruka"=>"Greska sa bazom"]);
                http_response_code(501);
                
            }
        }
        catch(PDOException $e){
            http_response_code(500);
            $e->getMessage();
        }
    }
    else{
        http_response_code(500);
    }
?>