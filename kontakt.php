<?php session_start();
    include_once ("pages/header.php");
    include_once ("pages/nav.php");
?>
<div class="container">
    <div class="min-vh-100 col-12 row align-items-center justify-content-center w-100">
        <form class="w-100">
            <div class="form-group">
                <label for="imeKontakt">Ime</label>
                <input type="text" class="form-control" id="imeKontakt" placeholder="Unesite ime">
                <span class="text-danger" id="imeKontaktGreska"></span>
            </div>
            <div class="form-group">
                <label for="prezimeKontakt">Prezime</label>
                <input type="text" class="form-control" id="prezimeKontakt" placeholder="Unesite prezime">
                <span class="text-danger" id="prezimeKontaktGreska"></span>
            </div>
            <div class="form-group">
                <label for="emailKontakt">Email</label>
                <input type="text" class="form-control" id="emailKontakt" placeholder="Unesite email">
                <span class="text-danger" id="emailKontaktGreska"></span>
            </div>
            <div class="form-group">
                <label for="textKontakt">Poruka</label>
                <textarea class="form-control" id="textKontakt" rows="3"></textarea>
                <span class="text-danger" id="textKontaktGreska"></span>
            </div>
            <button class="btn btn-dark w-100" id="dugmeKontakt">Pošalji</button>         
        </form>
        <div id="uspesanUnos" class="text-success"></div>
    </div>
</div>
<?php
    include_once ("pages/footer.php")
?>