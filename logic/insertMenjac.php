<?php
    define("regexPogon", "/^[A-Za-z0-9]+$/");
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include ("../data/connection.php");       
        try{
            if(isset($_POST['menjacX']) OR !empty($_POST['menjacX']) OR !preg_match(regexKaroserija, $_POST['menjacX'])){
                $menjac = $_POST['menjacX'];
            }
            $upit = "INSERT INTO menjac values(null, :menjac)";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":menjac", $menjac);
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