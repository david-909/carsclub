<?php
    $nizGreska = array();
    function provera($regex, $input, $greska){
        global $nizGreska;
        if(!preg_match($regex, $input)){
            array_push($nizGreska, $greska);
        }
        return $input;
    }
    function unosKorisnika($ime, $prezime, $username, $password, $email, $pol, $rol, $aktivan, $kod, $glasao){
        global $con;
        $upit = "INSERT INTO users VALUES(null, :ime, :prezime, :username, :password, :email, null, :pol, :rol, :aktivan, :kod, :glasao)";
        $prepare = $con -> prepare($upit);
        $prepare -> bindParam(":ime", $ime);
        $prepare -> bindParam(":prezime", $prezime);
        $prepare -> bindParam(":username", $username);
        $prepare -> bindParam(":password", $password);
        $prepare -> bindParam(":email", $email);
        $prepare -> bindParam(":rol", $rol);
        $prepare -> bindParam(":pol", $pol);
        $prepare -> bindParam(":aktivan", $aktivan);
        $prepare -> bindParam(":kod", $kod);
        $prepare -> bindParam(":glasao", $glasao);
        $rez = $prepare -> execute();
        return $rez;
    }
    function unosPoruka($ime, $prezime, $email, $poruka){
        global $con;
        $upit = "INSERT INTO poruka VALUES(null, :ime, :prezime, :email, :poruka)";
        $prepare = $con -> prepare($upit);
        $prepare -> bindParam(":ime", $ime);
        $prepare -> bindParam(":prezime", $prezime);
        $prepare -> bindParam(":email", $email);
        $prepare -> bindParam(":poruka", $poruka);
        $rez = $prepare -> execute();
        return $rez;
    }
    function unosSlike($putanja,$kolaID){
        global $con;
        $upit = "INSERT INTO slike VALUES(null, :putanja, :kolaID)";
        $prepare = $con -> prepare($upit);
        $prepare -> bindParam(":putanja", $putanja);
        $prepare -> bindParam(":kolaID", $kolaID);
        $rez = $prepare -> execute();
        return $rez;
    }
    function posaljiMejl(){
        global $con;
        $id = $con -> lastInsertId();
        $upit = "SELECT kod, mail FROM users WHERE userID = :id";
        $prepare = $con -> prepare($upit);
        $prepare -> bindParam(":id", $id);
        $prepare -> execute();
        $rez = $prepare -> fetch();
        $poruka = "http://localhost/sajt/index.php?id=$id&kod=$rez->kod";
        mail($rez->mail, "Molimo aktivirajte svoj nalog", $poruka);
    }
?>