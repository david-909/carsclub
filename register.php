<?php session_start();
    include_once ("pages/header.php");
    include_once ("pages/nav.php");
?>
    <div class="container">
        <div class="min-vh-100 col-12 row align-items-center justify-content-center w-100">
            <form class="w-100">
                <div class="form-group">
                    <label for="imeRegister">Ime</label>
                    <input type="text" class="form-control" id="imeRegister" placeholder="Unesite ime">
                    <span class="text-danger" id="imeRegisterGreska"></span>
                </div>
                <div class="form-group">
                    <label for="prezimeRegister">Prezime</label>
                    <input type="text" class="form-control" id="prezimeRegister" placeholder="Unesite prezime">
                    <span class="text-danger" id="prezimeRegisterGreska"></span>
                </div>
                <div class="form-group">
                    <label for="emailRegister">E-mail</label>
                    <input type="email" class="form-control" id="emailRegister" placeholder="Unesite e-mail">
                    <span class="text-danger" id="emailRegisterGreska"></span>
                </div>
                <div class="form-group">
                    <label for="usernameRegister">Korisničko ime</label>
                    <input type="text" class="form-control" id="usernameRegister" placeholder="Unesite korisničko ime">
                    <span class="text-danger" id="usernameGreska"></span>
                </div>
                <div class="form-group">
                    <label for="passwordRegister">Lozinka</label>
                    <input type="password" class="form-control" id="passwordRegister" placeholder="Unesite lozinku">
                    <span class="text-danger" id="passwordRegisterGreska"></span>
                </div>
                <div class="form-group">
                    <label for="passwordRegisterConfirm">Potvrdide lozinku</label>
                    <input type="password" class="form-control" id="passwordRegisterConfirm" placeholder="Potvrdide lozinku">
                    <span class="text-danger" id="passwordConfirmRegisterGreska"></span>
                </div>
                <label>Pol:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pol" value="1">
                    <label class="form-check-label">
                        Muški
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pol" value="2">
                    <label class="form-check-label">
                        Ženski
                    </label>
                </div>
                <span class="text-danger" id="polGreska"></span>
                <button class="btn btn-dark w-100" id="dugmeRegister">Submit</button>
                
            </form>
            <div id="uspesanUnos"></div>
        </div>
    </div>

<?php
    include_once ("pages/footer.php")
?>