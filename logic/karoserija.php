<?php
    include_once("data/connection.php");
    $upit = "SELECT * FROM karoserija";
    $kolaBaza = $con -> query($upit);
    $kola = $kolaBaza->fetchAll();
    foreach($kola as $auto){
        echo "<option value='$auto->karoserijaID'>$auto->karoserija</option>";
    }
?>