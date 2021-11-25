<?php
    include_once ("pages/header.php");
    include_once ("pages/nav.php");
?>
    <form>
        Marka:
        <select id="marka" name="marka">
        <?php
            include_once("marke.php");
        ?>
        </select><br>
        Model: <input type="text" name="model" id="model"><br>
        KM: <input type="text" name="km" id="km"><br>
        Vrsta pogona:
        <select id="pogon" name="pogon">
            <?php
            include_once("pogon.php");
            ?>
        </select><br>
        Odaberite karoseriju:
        <select id="karoserija" name="karoserija">
            <?php
            include_once("karoserija.php");
            ?>
        </select><br>
        Odaberite menjac:
        <select id="menjac" name="menjac">
            <?php
            include_once("menjac.php");
            ?>
        </select><br>
        Unesite boju:
        <input type="text" id="boja" name="boja"><br>
        Unesite snagu motora:
        <input type="text" id="snaga" name="snaga"><br>
        Unesite godinu proizvodnje:
        <input type="text" id="godina" name="godina"><br>
        Unesite cenu:
        <input type="text" name="cena" id="cena"><br>
        Unesite kubikazu:
        <input type="text" name="kubikaza" id="kubikaza"><br>
        <input type="file" name="slika" id="slika"><br>
        <input type="button" value="Submit" id="dugme">
    </form>
<?php
    include_once ("pages/footer.php");
?>