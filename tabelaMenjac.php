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
                <td colspan="2"><input type="text" id="menjacUnos" class="form-control w-100" placeholder="Unesite vrstu menjača"></td>
                <td colspan="2"><button class="btn btn-dark w-100" id="unesiMenjac">Unesi u bazu</button></td>
            </tr>
            <tr>
                <td colspan="4"><span id="menjacGreska" class="text-center text-danger"></span></td>
            </tr>
            <tr>
                <td>MenjacID</td>
                <td>Menjac</td>
                <td>Izmeni</td>
                <td>Obriši</td>
            </tr>
            <?php
                $upit = "SELECT * FROM menjac";
                $rez = $con -> query($upit);
                foreach($rez as $r){
                    echo "<tr><td data-baza='$r->menjacID'>$r->menjacID</td><td data-id='polje$r->menjacID'>$r->menjac</td><td><button class='btn-dark btn w-100' id='$r->menjacID' name='menjacUpdate'>Izmeni</button></td><td><button class='btn btn-dark w-100' id='$r->menjacID' name='menjacDelete'>Obriši</button></td></tr>";
                }
            ?>
            
        </table>
    </div>
<?php
    }
    include ("pages/footer.php");
?>