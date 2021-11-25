<?php
    session_start();
    define("regexPassword", "/^[A-Z\w\d!@?]+$/");
    define("regexUsername", "/^[A-Z\w\d!@?]+$/"); 

    header("Content-type: application/json");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            
            include_once ("../data/connection.php");
            include_once ("functions.php");
            global $con;
            
            if(isset($_POST['usernameX']) and !empty($_POST['usernameX'])){
                $username = $_POST['usernameX'];
            }
            if(isset($_POST['passwordX']) and !empty($_POST['passwordX'])){
                $password = $_POST['passwordX'];
                $passwordmd5 = md5($password);
            }


            provera(regexPassword, $password, "Greska pass");
            provera(regexUsername, $username, "Greska username"); 
          
            if(count($nizGreska) == 0){
                $upit = "SELECT * FROM users WHERE username = :user and password = :pass";
                $prepare = $con -> prepare($upit);
                $prepare -> bindParam(":user", $username);
                $prepare -> bindParam(":pass", $passwordmd5);
                $prepare -> execute();
                $rez = $prepare->fetch();
                if($rez){
                    $_SESSION['username'] = $rez->username;
                    $_SESSION['userID'] = $rez->userID;
                    $_SESSION['role']= $rez->roleID;
                    $_SESSION['aktivan'] = $rez->aktivan;
                    echo json_encode($rez);
                    http_response_code(200);
                }
                else{
                    $nema = ["poruka"=>"Ne postoji korisnik sa tim parametrima"];
                    echo json_encode($nema);
                }
  
            }   
            
        }
        catch(PDOException $e){
            http_response_code(500);
            
        }
    }
?>