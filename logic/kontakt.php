<?php
    define("regexImePrezime", "/^[A-Z][a-z]{3,}$/");
    define("regexEmail", "/^\S+@(gmail.com|yahoo.com|ict.edu.rs)$/");

    header("Content-type: application/json");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            global $con;
            include_once ("../data/connection.php");
            include_once ("functions.php");
            
            if(isset($_POST['imeX']) and !empty($_POST['imeX'])){
                $ime = $_POST['imeX'];
            }
            if(isset($_POST['prezimeX']) and !empty($_POST['prezimeX'])){
                $prezime = $_POST['prezimeX'];
            }
            if(isset($_POST['emailX']) and !empty($_POST['emailX'])){
                $email = $_POST['emailX'];
            }
            if(isset($_POST['textX']) and !empty($_POST['textX'])){
                $poruka = $_POST['textX'];
            }


            provera(regexImePrezime, $ime, "Greska ime");
            provera(regexImePrezime, $prezime, "Greska prezime");
            provera(regexEmail, $email, "Greska email");
            if(strlen($poruka) < 20){
                array_push($nizGreska, "Greska text");
            }
             
            if(count($nizGreska) == 0){
                $unosPoruka = unosPoruka($ime, $prezime, $email, $poruka);
                if($unosPoruka){
                    $odg = ["poruka"=>"Poruka je poslata"];
                    echo json_encode($odg);
                    http_response_code(201);
                }
            }
        }
        catch(PDOException $e){
            http_response_code(500);
            
        }
    }
?>