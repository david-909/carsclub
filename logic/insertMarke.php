<?php
    define("regexMarke", "/^[A-Z][A-Za-z0-9]+$/");
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include ("../data/connection.php");       
        try{
            if(isset($_POST['markaX']) OR !empty($_POST['markaX']) OR !preg_match(regexMarke, $_POST['markaX'])){
                $marka = $_POST['markaX'];
            }
            $upit = "INSERT INTO kolamarke values(null, :marka)";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":marka", $marka);
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