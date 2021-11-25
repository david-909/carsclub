<?php session_start();
    include ("pages/header.php");
    include ("pages/nav.php");
    if(isset($_SESSION['username'])){
        if($_SESSION['role'] == 2){
            header("Location: panel.php");
        }
    }
?>

    <div class="container">
        <div class="min-vh-100 col-12 row align-items-center justify-content-center w-100">
            <form class="w-100">
                <div class="form-group">
                    <label for="usernameLogin">Korisničko ime</label>
                    <input type="text" class="form-control" id="usernameLogin" placeholder="Unesite korisničko ime">
                    <span class="text-danger" id="usernameLoginGreska"></span>
                </div>
                <div class="form-group">
                    <label for="passwordRegister">Lozinka</label>
                    <input type="password" class="form-control" id="passwordLogin" placeholder="Unesite lozinku">
                    <span class="text-danger" id="passwordLoginGreska"></span>
                </div>
                <button class="btn btn-dark w-100" id="dugmeLogin">Submit</button>            
            </form>
            <div id="nema"></div>
        </div>
    </div>

<?php
    include_once ("pages/footer.php")
?>

