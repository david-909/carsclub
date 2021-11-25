<?php session_start();
    if($_SESSION['role'] != 2){
        header("Location: index.php");
    }
    include ("pages/header.php");
    include ("pages/nav.php");
    if(isset($_SESSION['username']) AND $_SESSION['role'] == 2):
?>
    <div class="container min-vh-100">
        <div class="row">
            <div class="col-lg-2 col-md-4 mt-3 text-center">
                <a href="tabelaKaroserija.php" id="tabelaKaroserija" class="btn btn-dark w-100">Karoserija</a>
            </div>
            <div class="col-lg-2 col-md-4 mt-3">
                <a id="tabelaMarke" href="tabelaKolamarke.php" class="btn btn-dark w-100">Marke kola</a>
            </div>
            <div class="col-lg-2 col-md-4 mt-3">
                <a id="tabelaKaroserija" href="tabelaMenjac.php" class="btn btn-dark w-100">Menjač</a>
            </div>
            <div class="col-lg-2 col-md-4 mt-3">
                <a id="tabelaPogon" href="tabelaPogon.php" class="btn btn-dark w-100">Pogon</a>
            </div>
            <div class="col-lg-2 col-md-4 mt-3">
                <a id="tabelaKaroserija" class="btn btn-dark w-100">Pol</a>
            </div>
            <div class="col-lg-2 col-md-4 mt-3">
                <a id="tabelaKaroserija" class="btn btn-dark w-100">Uloge korisnika</a>
            </div>
            
            <div class="col-lg-4 margina">
                <button id="panelKorsnici" class="w-100 btn btn-dark">Korisnici</button>
            </div>
            <div class="col-lg-4 margina">
                <button id="panelKola" class="w-100 btn btn-dark">Automobili</button>
            </div>         
            <div class="col-lg-4 margina">
                <button id="panelPoruka" class="w-100 btn btn-dark">Poruke</button>
            </div>
                      
        </div>
        <div id="prikaz"></div>
    </div>
<?php 
    endif;
?>
<?php
    include ("pages/footer.php");
?>