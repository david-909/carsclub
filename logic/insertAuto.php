<?php
if(!isset($_SESSION)){
    session_start();
}

    header("Content-type: application/json");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            include_once ("../data/connection.php");
            include_once ("functions.php");
            $userID = $_SESSION['userID'];
            $marka = $_POST['markaX'];
            $model = $_POST['modelX'];
            $godina = $_POST['godinaX'];
            $snaga = $_POST['snagaX'];
            $pogon = $_POST['pogonX'];
            $karoserija = $_POST['karoserijaX'];
            $kubikaza = $_POST['kubikazaX'];
            $menjac = $_POST['menjacX'];
            $kilometraza = $_POST['kilometrazaX'];
            $boja = $_POST['bojaX'];

            $upit = "INSERT INTO kola VALUES(null, :marka, :model, :godina, :km, :kubikaza, :snaga, :pogon, :menjac, :boja, :karoserija, :userID)";
            $prepare = $con -> prepare($upit);
            $prepare -> bindParam(":marka", $marka);
            $prepare -> bindParam(":model", $model);
            $prepare -> bindParam(":godina", $godina);
            $prepare -> bindParam(":km", $kilometraza);
            $prepare -> bindParam(":kubikaza", $kubikaza);
            $prepare -> bindParam(":snaga", $snaga);
            $prepare -> bindParam(":pogon", $pogon);
            $prepare -> bindParam(":menjac", $menjac);
            $prepare -> bindParam(":boja", $boja);
            $prepare -> bindParam(":karoserija", $karoserija);
            $prepare -> bindParam(":userID", $userID);
            $prepare -> execute();
            $kolaID = $con->lastInsertId();

            $countfiles = count($_FILES['files']['name']);          
            $upload_location = "../assets/img/uploads/";
            $files_arr = array();
            for($index = 0;$index < $countfiles;$index++){

            if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                $filename = $_FILES['files']['name'][$index];
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $valid_ext = array("png","jpeg","jpg");
                if(in_array($ext, $valid_ext)){
                    $path = $upload_location.$filename;
                    if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                        $files_arr[] = $path;

                    }
                    $path = substr($path, 3);
                    try{
                        $rez = unosSlike($path,$kolaID);
                    }
                    catch(PDOException $e){
                        http_response_code(500);
                        echo $e->getMessage();
                    }
                    
                }

            }
            }
            $odg = ["poruka"=>"Slike su unesene u bazu"];
            echo json_encode($odg);
            
        }
        catch(PDOException $e){
            http_response_code(500);
            echo $e ->getMessage();
            
        }
    }
?>