<?php
    include_once("data/connection.php");
    $upit = "SELECT * FROM menjac";
    $kolaBaza = $con -> query($upit);
    $kola = $kolaBaza -> fetchAll();
    foreach($kola as $auto){
        echo "<option value='$auto->menjacID'>$auto->menjac</option>";
    }
?>