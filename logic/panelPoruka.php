<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            include ("../data/connection.php");
            $upit = "SELECT * FROM poruka";
            $odg = "<table class='table table dark w-100 margina'><tr><td>Poruka ID</td><td>Ime</td><td>Prezime</td><td>Email</td><td class='sirina'>Poruka</td><td>Obriši</td></tr>";
            $rez = $con -> query($upit)-> fetchAll();
            foreach($rez as $r){
                $odg .= "<tr><td>$r->porukaID</td><td>$r->ime</td><td>$r->prezime</td><td>$r->email</td><td>$r->poruka</td><td><button class='btn btn-dark' id='$r->porukaID' name='deletePoruka'>Obriši</button></td></tr>";
            }
            $odg .= "</table>";
            echo json_encode($odg);
        }
        catch(PDOException $e){
            http_response_code(500);
        }
    }
?>