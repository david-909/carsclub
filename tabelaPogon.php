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
                <td colspan="2"><input type="text" id="pogonUnos" class="form-control w-100" placeholder="Unesite vrstu pogona"></td>
                <td colspan="2"><button class="btn btn-dark w-100" id="unesiPogon">Unesi u bazu</button></td>
            </tr>
            <tr>
                <td colspan="4"><span id="pogonGreska" class="text-center text-danger"></span></td>
            </tr>
            <tr>
                <td>PogonID</td>
                <td>Pogon</td>
                <td>Izmeni</td>
                <td>Obriši</td>
            </tr>
            <?php
                $upit = "SELECT * FROM pogon";
                $rez = $con -> query($upit);
                foreach($rez as $r){
                    echo "<tr><td data-baza='$r->pogonID'>$r->pogonID</td><td data-id='polje$r->pogonID'>$r->pogon</td><td><button class='btn-dark btn w-100' id='$r->pogonID' name='pogonUpdate'>Izmeni</button></td><td><button class='btn btn-dark w-100' id='$r->pogonID' name='pogonDelete'>Obriši</button></td></tr>";
                }
            ?>
            
        </table>
    </div>
<?php
    }
    include ("pages/footer.php");
?>