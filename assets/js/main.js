$(document).ready(function () {
    var poruka = document.getElementById("searchPoruka");
    //REGISTER
    $(document).on("click", "#dugmeRegister",function (e) { 
        e.preventDefault();
        nizGreske = [];
        var ime = $("#imeRegister");
        var prezime = $("#prezimeRegister");
        var email = $("#emailRegister");
        var password = $("#passwordRegister");
        var passwordConfirm = $("#passwordRegisterConfirm");
        var username = $("#usernameRegister");
        var pol = $("input[name='pol']:checked").val();

        var greskaIme = $("#imeRegisterGreska");
        var greskaPrezime = $("#prezimeRegisterGreska");
        var greskaEmail = $("#emailRegisterGreska");
        var greskaPassword = $("#passwordRegisterGreska");
        var greskaConfirm = $("#passwordConfirmRegisterGreska");
        var polGreska = $("#polGreska");
        var greskaUsername = $("#usernameGreska");

        var regexEmail = /^\S+@\S+[.\S]+$/;
        var regexPassword = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
        var regexImePrezime = /^[A-Z][a-z]{3,}$/;
        var regexUsername = /^[A-Z\w\d!@?]+$/;

        provera(regexEmail, email, "Email nije u dobrom formatu", greskaEmail);
        provera(regexImePrezime, ime, "Ime mora početi velikim slovom", greskaIme);
        provera(regexImePrezime, prezime, "Prezime mora početi velikim slovom", greskaPrezime);
        provera(regexPassword, password, "Lozinka mora imati minimum 8 karaktera, jedno veliko slovo, jedan broj", greskaPassword);
        provera(regexUsername, username, "Username može da sadrži specijalne karaktere !@?, velika i mala slova i brojeve", greskaUsername);
        
        if(password.val() != passwordConfirm.val()){
            nizGreske.push("Greska");
            greskaConfirm.html("Lozinke se ne poklapaju");
        }
        if(typeof pol == "undefined"){
            console.log(pol);
            nizGreske.push("Greska");
            polGreska.html("Morate izabrati pol");
        }

        if(nizGreske.length == 0){
            $.ajax({
                type: "POST",
                url: "logic/register.php",
                data: {
                    imeX: $(ime).val(),
                    prezimeX: $(prezime).val(),
                    passwordX: $(password).val(),
                    usernameX: $(username).val(),
                    emailX: $(email).val(),
                    polX: pol
                },
                dataType: "JSON",
                success: function (response) {
                    $("#uspesanUnos").html(`<span class="alert alert-dark" role="alert">${response.poruka}</span>`);
                    console.log(response.poruka);
                },
                error: function(xhr){
                    console.error(xhr);
                }
            });
            
        }
    });

    //LOGIN
    $("#dugmeLogin").click(function (e) { 
        nizGreske = [];
        e.preventDefault();
        var username = $("#usernameLogin");
        var password = $("#passwordLogin");

        var regexUsername = /^[A-Z\w\d!@?]+$/;
        var regexPassword = /^[A-Za-z\d]+$/;

        var greskaPassword = $("#passwordLoginGreska");
        var greskaUsername = $("#usernameLoginGreska");

        provera(regexUsername, username, "Korisnicko ime nije dobro", greskaUsername);
        provera(regexPassword, password, "Lozinka nije dobra", greskaPassword);

        if(nizGreske.length == 0){
            console.log("ee");
            $.ajax({
                type: "POST",
                url: "logic/login.php",
                data: {
                    usernameX: $(username).val(),
                    passwordX: $(password).val()
                },
                dataType: "json",
                success: function (response) {
                    $("#nema").html(`<span class="alert alert-dark" role="alert">${response.poruka}</span>`) 
                    console.log(response);
                    location.reload();
                },
                error: function(xhr){
                    console.error(xhr);
                }
            });
        }
    });
    //LOGOUT
    $("#logout").click(function (e) { 
        $.ajax({
            type: "post",
            url: "logic/logout.php",
            data: {},
            dataType: "json",
            success: function (response) {
                if(response){
                    window.location.replace("index.php");
                }
            }
        });
        
    });
    //PANEL KORISNICI
    $("#panelKorsnici").click(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "logic/panelKorisnici.php",
            data: {},
            dataType: "json",
            success: function (response) {
                $("#prikaz").html(response);
            }
        });
    });
    //PANEL KOLA
    $("#panelKola").click(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "logic/panelKola.php",
            data: {},
            dataType: "json",
            success: function (response) {
                $("#prikaz").html(response);
            }
        });
    })
    //PANEL PORUKE
    $("#panelPoruka").click(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "logic/panelPoruka.php",
            data: {},
            dataType: "json",
            success: function (response) {
                $("#prikaz").html(response);
            }
        });
    })
    //BRISANJE KORISNIKA
    $(document).on("click", "button[name='deleteUser']", function () {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "logic/deleteUser.php",
            data: {
                userID: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    //BRISANJE KOLA
    $(document).on("click", "button[name='deleteAuto']", function () {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "logic/deleteAuto.php",
            data: {
                kolaID: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    //BRISANJE PORUKA
    $(document).on("click", "button[name='deletePoruka']", function () {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "logic/deletePoruka.php",
            data: {
                porukaID: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    //POSTAVLJANJE
    $("#dugmePostavka").click(function (e) { 
        nizGreske = [];
        e.preventDefault();
        var marka = $("#markaSelect").val();
        var model = $("#model");
        var godina = $("#godinaSelect").val();
        var kilometraza = $("#kilometraza");
        var kubikaza = $("#kubikaza");
        var snaga = $("#snaga");
        var boja = $("#boja");
        var menjac = $("#menjacSelect").val();
        var karoserija = $("#karoserijaSelect").val();
        var pogon = $("#pogonSelect").val();

        var greskaModel = $("#modelGreska");
        var greskaKilometraza = $("#kilometrazaGreska");
        var greskaKubikaza = $("#kubikazaGreska");
        var greskaSnaga = $("#snagaGreska");
        var greskaBoja = $("#bojaGreska");

        var regexModel = /^[A-Za-z0-9\S]+$/
        var regexBoja = /^[A-Za-z]+$/
        var regexKilometrazaKubikazaSnaga = /^[0-9]+$/
        if(marka == 0){
            nizGreske.push("Greska marka");
            $("#markaGreska").html("Morate izabrati marku");
        }
        else{
            $("#markaGreska").html("");
        }
        if(godina == 0){
            nizGreske.push("Greska godina");
            $("#godinaGreska").html("Morate izabrati godište");
        }
        else{
            $("#godinaGreska").html("");
        }
        if(menjac == 0){
            nizGreske.push("Greska menjac");
            $("#menjacGreska").html("Morate izabrati menjač");
        }
        else{
            $("#menjacGreska").html("");
        }
        if(karoserija == 0){
            nizGreske.push("Greska karoserija");
            $("#karoserijaGreska").html("Morate izabrati karoseriju");
        }
        else{
            $("#karoserijaGreska").html("");
        }
        if(pogon == 0){
            nizGreske.push("Greska pogon");
            $("#pogonGreska").html("Morate izabrati vrstu pogona");
        }
        else{
            $("#pogonGreska").html("");
        }
        provera(regexModel, model, "Morate izabrati model", greskaModel);
        provera(regexKilometrazaKubikazaSnaga, kilometraza, "Morate upisati kilometrazu", greskaKilometraza);
        provera(regexKilometrazaKubikazaSnaga, kubikaza, "Morate upisati kubikažu", greskaKubikaza);
        provera(regexKilometrazaKubikazaSnaga, snaga, "Morate upisati snagu", greskaSnaga);
        provera(regexBoja, boja, "Morate upisati boju", greskaBoja);
        var form_data = new FormData();
     
        var totalfiles = document.getElementById('files').files.length;
        for (var index = 0; index < totalfiles; index++) {
           form_data.append("files[]", document.getElementById('files').files[index]);
        }

        form_data.append("markaX", marka);
        form_data.append("modelX", model.val());
        form_data.append("godinaX", godina);
        form_data.append("kilometrazaX", kilometraza.val());
        form_data.append("kubikazaX", kubikaza.val());
        form_data.append("snagaX", snaga.val());
        form_data.append("menjacX", menjac);
        form_data.append("karoserijaX", karoserija);
        form_data.append("pogonX", pogon);
        form_data.append("bojaX", boja.val());

        $.ajax({
            type: 'POST',
            url: 'logic/insertAuto.php', 
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                $("#unosUspesan").html(`<p class="alert alert-dark text-success mb-3" role="alert">${response.poruka}</p>`)
            }
        });    
    });
    //KONTAKT
    $("#dugmeKontakt").click(function (e) {
        nizGreske = [];
        e.preventDefault();
        var ime = $("#imeKontakt");
        var prezime = $("#prezimeKontakt");
        var email = $("#emailKontakt");
        var text = $("#textKontakt").val();

        var regexImePrezime = /^[A-Z][a-z]{3,}$/;
        var regexEmail = /^\S+@(gmail.com|yahoo.com|ict.edu.rs)$/;

        if(text < 20){
            nizGreske.push("Poruka mora da ima minimum 20 karaktera");
            $("#textKontaktGreska").html("Poruka mora da ima minimum 20 karaktera");
        }
        else{
            $("#textKontaktGreska").html("");
        }

        var greskaIme = $("#imeKontaktGreska");
        var greskaPrezime = $("#prezimeKontaktGreska");
        var greskaEmail = $("#emailKontaktGreska");

        provera(regexImePrezime, ime, "Morate uneti ime", greskaIme);
        provera(regexImePrezime, prezime, "Morate uneti prezime", greskaPrezime);
        provera(regexEmail, email, "Morate uneti email", greskaEmail);

        $.ajax({
            type: "POST",
            url: "logic/kontakt.php",
            data: {
                imeX: ime.val(),
                prezimeX: prezime.val(),
                emailX: email.val(),
                textX: text,
            },
            dataType: "json",
            success: function (response) {
                $("#uspesanUnos").html(`<span class="alert alert-dark text-success" role="alert">${response.poruka}</span>`);
            }
        });
    });
    //UNOS U TABELU KAROSERIJA
    $("#unesiKaroseriju").click(function (e) { 
        nizGreske = [];
        e.preventDefault();
        var karoserija = $("#karoserijaUnos");
        var karoserijaGreska = $("#karoserijaGreska");
        var regexKaroserija = /^[A-Z][A-Za-z]+$/;
        provera(regexKaroserija, karoserija, "Morate uneti tip karoserije, samo su slova dozvoljenja", karoserijaGreska);
        console.log(nizGreske);
        if(nizGreske.length == 0){
            $.ajax({
                type: "POST",
                url: "logic/insertKaroserija.php",
                data: {
                    karoserijaX: karoserija.val()
                },
                dataType: "json",
                success: function (response) {
                    karoserijaGreska.html(response.poruka);
                    location.reload();
                }
            });
        }
    });
    //BRISANJE IZ TABELE KAROSERIJA
    $(document).on("click", "button[name='karoserijaDelete']", function () {
        var id = $(this).attr('id');
        console.log(id);
        $.ajax({
            type: "POST",
            url: "logic/deleteKaroserija.php",
            data: {
                karoserijaID: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    //UPDATE U TABELI KAROSERIJA
    $(document).on("click", "button[name='karoserijaUpdate']", function () {
       var poljeText = $(this).parent().parent().find("td[data-id]").text(); //VREDNOST INPUT POLJA
       var poljeID = $(this).parent().parent().find("td[data-baza]").text(); //VREDNOST IDA U BAZI
       var polje = $(this).parent().parent().find("td[data-id]"); // INPUT POLJE
       var polje2 = $(this).parent() //IZMENI DUGME 
       $(polje2).html(`<button name='karoserijaUpdateBaza' id='${poljeID}' class='btn btn-dark w-100'>Promeni</button>`)
       $(polje).html(`<input class="form-control" type='text' value='${poljeText}' id='karoserijaPoljeUnos'>`);
    });
    $(document).on("click","button[name='karoserijaUpdateBaza']", function () {
        var id = $(this).attr("id");
        var text = $("#karoserijaPoljeUnos").val();
        console.log(id);
        $.ajax({
            type: "POST",
            url: "logic/updateKaroserija.php",
            data: {
                karoserijaID: id,
                textX: text
            },
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
    });
    //UNOS U TABLU POGON
    $("#unesiPogon").click(function (e) { 
        nizGreske = [];
        e.preventDefault();
        var pogon = $("#pogonUnos");
        var pogonGreska = $("#pogonGreska");
        var regexPogon = /^[A-Za-z0-9]+$/;
        provera(regexPogon, pogon, "Morate uneti vrstu pogona, slova i brojevi su dozvoljeni", pogonGreska);
    
        if(nizGreske.length == 0){
            $.ajax({
                type: "POST",
                url: "logic/insertPogon.php",
                data: {
                    pogonX: pogon.val()
                },
                dataType: "json",
                success: function (response) {
                    pogonGreska.html(response.poruka);
                    location.reload();
                }
            });
        }
    });
    //BRISANJE IZ TABELE POGON
    $(document).on("click", "button[name='pogonDelete']", function () {
        var id = $(this).attr('id');
        console.log(id);
        $.ajax({
            type: "POST",
            url: "logic/deletePogon.php",
            data: {
                pogonID: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    //UPDATE U TABELI POGON
    $(document).on("click", "button[name='pogonUpdate']", function () {
        var poljeText = $(this).parent().parent().find("td[data-id]").text(); //VREDNOST INPUT POLJA
        var poljeID = $(this).parent().parent().find("td[data-baza]").text(); //VREDNOST IDA U BAZI
        var polje = $(this).parent().parent().find("td[data-id]"); // INPUT POLJE
        var polje2 = $(this).parent() //IZMENI DUGME 
        $(polje2).html(`<button name='pogonUpdateBaza' id='${poljeID}' class='btn btn-dark w-100'>Promeni</button>`)
        $(polje).html(`<input class="form-control" type='text' value='${poljeText}' id='pogonPoljeUnos'>`);
     });
     $(document).on("click","button[name='pogonUpdateBaza']", function () {
         var id = $(this).attr("id");
         var text = $("#pogonPoljeUnos").val();
         console.log(id);
         $.ajax({
             type: "POST",
             url: "logic/updatePogon.php",
             data: {
                 pogonID: id,
                 textX: text
             },
             dataType: "json",
             success: function (response) {
                 location.reload();
             }
         });
     });
     //UNOS U TABELU MENJAC
     $("#unesiMenjac").click(function (e) { 
        nizGreske = [];
        e.preventDefault();
        var menjac = $("#menjacUnos");
        var menjacGreska = $("#menjacGreska");
        var regexMenjac = /^[A-Za-z0-9]+$/;
        provera(regexMenjac, menjac, "Morate uneti vrstu menjača, slova i brojevi su dozvoljeni", menjacGreska);
    
        if(nizGreske.length == 0){
            $.ajax({
                type: "POST",
                url: "logic/insertMenjac.php",
                data: {
                    menjacX: menjac.val()
                },
                dataType: "json",
                success: function (response) {
                    menjacGreska.html(response.poruka);
                    location.reload();
                }
            });
        }
    });
    //BRISANJE IZ TABELE MENJAC
    $(document).on("click", "button[name='menjacDelete']", function () {
        var id = $(this).attr('id');
        console.log(id);
        $.ajax({
            type: "POST",
            url: "logic/deleteMenjac.php",
            data: {
                menjacID: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    //UPDATE U TABELI POGON
    $(document).on("click", "button[name='menjacUpdate']", function () {
        var poljeText = $(this).parent().parent().find("td[data-id]").text(); //VREDNOST INPUT POLJA
        var poljeID = $(this).parent().parent().find("td[data-baza]").text(); //VREDNOST IDA U BAZI
        var polje = $(this).parent().parent().find("td[data-id]"); // INPUT POLJE
        var polje2 = $(this).parent() //IZMENI DUGME 
        $(polje2).html(`<button name='menjacUpdateBaza' id='${poljeID}' class='btn btn-dark w-100'>Promeni</button>`)
        $(polje).html(`<input class="form-control" type='text' value='${poljeText}' id='menjacPoljeUnos'>`);
        });
    $(document).on("click","button[name='menjacUpdateBaza']", function () {
        var id = $(this).attr("id");
        var text = $("#menjacPoljeUnos").val();
        console.log(id);
        $.ajax({
            type: "POST",
            url: "logic/updateMenjac.php",
            data: {
                menjacID: id,
                textX: text
            },
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
    });
    //UNOS U TABELU KOLAMARKE
    $("#unesiMarku").click(function (e) { 
        nizGreske = [];
        e.preventDefault();
        var marka = $("#markeUnos");
        var markaGreska = $("#markaGreska");
        var regexMarka = /^[A-Z][A-Za-z0-9]+$/;
        provera(regexMarka, marka, "Morate uneti naziv marke, slova i brojevi su dozvoljenji", markaGreska);
        console.log(nizGreske);
        if(nizGreske.length == 0){
            $.ajax({
                type: "POST",
                url: "logic/insertMarke.php",
                data: {
                    markaX: marka.val()
                },
                dataType: "json",
                success: function (response) {
                    markaGreska.html(response.poruka);
                    location.reload();
                }
            });
        }
    });
    //BRISANJE IZ TABELE KOLAMARKE
    $(document).on("click", "button[name='markeDelete']", function () {
        var id = $(this).attr('id');
        console.log(id);
        $.ajax({
            type: "POST",
            url: "logic/deleteMarke.php",
            data: {
                markaID: id
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });
    });
    //UPDATE U TABELI KOLAMARKE
    $(document).on("click", "button[name='markeUpdate']", function () {
        var poljeText = $(this).parent().parent().find("td[data-id]").text(); //VREDNOST INPUT POLJA
        var poljeID = $(this).parent().parent().find("td[data-baza]").text(); //VREDNOST IDA U BAZI
        var polje = $(this).parent().parent().find("td[data-id]"); // INPUT POLJE
        var polje2 = $(this).parent() //IZMENI DUGME 
        $(polje2).html(`<button name='markeUpdateBaza' id='${poljeID}' class='btn btn-dark w-100'>Promeni</button>`)
        $(polje).html(`<input class="form-control" type='text' value='${poljeText}' id='markePoljeUnos'>`);
        });
    $(document).on("click","button[name='markeUpdateBaza']", function () {
        var id = $(this).attr("id");
        var text = $("#markePoljeUnos").val();
        console.log(id);
        $.ajax({
            type: "POST",
            url: "logic/updateMarke.php",
            data: {
                markaID: id,
                textX: text
            },
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
    });
    $("#posaljiAnketu").click(function (e) { 
        console.log("click");
        nizGreske = [];
        var odgovorID = $("input[name='anketa']:checked").val();
        var anketaGreska = $("#anketaGreska");
        anketaGreska.text("");
        if (!odgovorID) {
            nizGreske.push("Morate izabrati neki odgovor");
            anketaGreska.text("Morate izabrati neki odgovor");
        }
        if(nizGreske.length == 0){
            $.ajax({
                type: "POST",
                url: "logic/anketa.php",
                data: {
                    odg: odgovorID
                },
                dataType: "json",
                success: function (response) {
                    location.reload();
                }
            });
        }
    });
    
    $('a[name=colorbox]').colorbox({
        transition: 'fade',
        speed: 400,
        current: "{current} of {total}"
    });
});
var nizGreske = [];
function provera(regex, input, greska, div){
    if(!regex.test(input.val())){
        nizGreske.push(greska);
        div.html(greska);
    }
    else{
        div.html("");
    }
}