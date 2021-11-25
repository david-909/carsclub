<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            include ("../data/connection.php");
            $upit = "SELECT * FROM kola k INNER JOIN users u ON u.userID = k.userID INNER JOIN kolamarke m ON m.markaID = k.markaID INNER JOIN pogon p ON p.pogonID = k.pogonID INNER JOIN menjac mn ON mn.menjacID = k.menjacID INNER JOIN karoserija kr ON kr.karoserijaID = k.karoserijaID";
            $odg = "<table class='table table dark w-100 margina'><tr><td>Kola ID</td><td>Marka</td><td>Model</td><td>Godina</td><td>KM</td><td>Kubikaza</td><td>Snaga</td><td>Pogon</td><td>Menjač</td><td>Boja</td><td>Karoserija</td><td>Obriši</td></tr>";
            $rez = $con -> query($upit)-> fetchAll();
            foreach($rez as $r){
                $odg .= "<tr><td>$r->kolaID</td><td>$r->marka</td><td>$r->model</td><td>$r->godina</td><td>$r->km</td><td>$r->kubikaza</td><td>$r->snaga</td><td>$r->pogon</td><td>$r->menjac</td><td>$r->boja</td><td>$r->karoserija</td><td><button class='btn btn-dark' id='$r->kolaID' name='deleteAuto'>Obriši</button></td></tr>";
            }
            $odg .= "</table>";
            echo json_encode($odg);
            http_response_code(201);
        }
        catch(PDOException $e){
            http_response_code(500);
        }
    }
?>