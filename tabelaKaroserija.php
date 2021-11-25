<?php
    session_start();
    include ("pages/header.php");
    include ("pages/nav.php");
    include ("data/connection.php");
    if(isset($_SESSION['username']) AND $_SESSION['role'] != 2){
        header("Location: index.php");
    }
    else{

?>
    <div class="container min-vh-100">
        <table class="w-100 table dark mt-5">
            <tr>
                <td colspan="2"><input type="text" id="karoserijaUnos" class="form-control w-100" placeholder="Unesite naziv karoserije"></td>
                <td colspan="2"><button class="btn btn-dark w-100" id="unesiKaroseriju">Unesi u bazu</button></td>
            </tr>
            <tr>
                <td colspan="4" class="text-center font-weight-bold"><span id="karoserijaGreska" class="text-danger"></span></td>
            </tr>
            <tr>
                <td>KaroserijaID</td>
                <td>Karoserija</td>
                <td>Izmeni</td>
                <td>Obriši</td>
            </tr>
            <?php
                $upit = "SELECT * FROM karoserija";
                $rez = $con -> query($upit);
                foreach($rez as $r){
                    echo "<tr><td data-baza='$r->karoserijaID'>$r->karoserijaID</td><td data-id='polje$r->karoserijaID'>$r->karoserija</td><td><button class='btn-dark btn w-100' id='$r->karoserijaID' name='karoserijaUpdate'>Izmeni</button></td><td><button class='btn btn-dark w-100' id='$r->karoserijaID' name='karoserijaDelete'>Obriši</button></td></tr>";
                }
            ?>
            
        </table>
    </div>
<?php
    }
    include ("pages/footer.php");
?>