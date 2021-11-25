<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            include ("../data/connection.php");
            $upit = "SELECT * FROM users u INNER JOIN userrole r ON u.roleID = r.roleID INNER JOIN pol p ON u.pol = p.pol";
            $odg = "<table class='table table dark w-100 margina'><tr><td>ID</td><td>Ime</td><td>Prezime</td><td>Korisnicko ime</td><td>Email</td><td>Timestamp</td><td>Pol</td><td>Uloga</td><td>Obriši</td></tr>";
            $rez = $con -> query($upit)-> fetchAll();
            foreach($rez as $r){
                $odg .= "<tr><td>$r->userID</td><td>$r->ime</td><td>$r->prezime</td><td>$r->username</td><td>$r->mail</td><td>$r->timestamp</td><td>$r->polIme</td><td>$r->name</td><td><button class='btn btn-dark' id='$r->userID' name='deleteUser'>Obriši</button></td></tr>";
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