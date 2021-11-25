<?php
    include_once("data/connection.php");
    $upit = "SELECT * FROM pogon";
    $kolaBaza = $con -> query($upit);
    $kola = $kolaBaza->fetchAll();
    foreach($kola as $auto){
        echo "<option value='$auto->pogonID'>$auto->pogon</option>";
    }
?>