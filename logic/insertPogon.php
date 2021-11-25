<?php
    define("regexPogon", "/^[A-Za-z0-9]+$/");
    header("Content-type: application/json");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include ("../data/connection.php");       
        try{
            if(isset($_POST['pogonX']) OR !empty($_POST['pogonX']) OR !preg_match(regexKaroserija, $_POST['pogonX'])){
                $pogon = $_POST['pogonX'];
            }
            $upit = "INSERT INTO pogon values(null, :pogon)";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":pogon", $pogon);
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