<?php
    define("regexIme", "/^[A-Z][a-z]{3,}$/");
    define("regexEmail", "/^\S+@\S+[.\S]+$/");
    define("regexPassword", "/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/");
    define("regexUsername", "/^[A-Z\w\d!@?]+$/");

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
            if(isset($_POST['usernameX']) and !empty($_POST['usernameX'])){
                $username = $_POST['usernameX'];
            }
            if(isset($_POST['passwordX']) and !empty($_POST['passwordX'])){
                $password = $_POST['passwordX'];
                $passwordmd5 = md5($password);
            }
            if(isset($_POST['emailX']) and !empty($_POST['emailX'])){
                $email = $_POST['emailX'];
            }
            if(isset($_POST['polX']) and !empty($_POST['polX'])){
                $pol = $_POST['polX'];
            }
            $role = 1;
            $aktivan = 0;
            $kod = rand(100000,99999999999);
            $glasao = 0;

            provera(regexIme, $ime, "Greska ime");
            provera(regexIme, $prezime, "Greska prezime");
            provera(regexEmail, $email, "Greska email");
            provera(regexPassword, $password, "Greska pass");
            provera(regexUsername, $username, "Greska username");
          
             
            if(count($nizGreska) == 0){
                $unosKorisnika = unosKorisnika($ime, $prezime, $username, $passwordmd5, $email, $pol, $role, $aktivan, $kod, $glasao);
                if($unosKorisnika){
                    $odg = ["poruka"=>"Uneto u bazu"];
                    echo json_encode($odg);
                    posaljiMejl();
                    http_response_code(201);
                }
            }
        }
        catch(PDOException $e){
            http_response_code(500);
            
        }
    }
?>