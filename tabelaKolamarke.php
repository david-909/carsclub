<?php
    session_start();
    $limit = 10;
    include ("pages/header.php");
    include ("pages/nav.php");
    include ("data/connection.php");
    if(isset($_SESSION['username']) AND $_SESSION['role'] != 2){
        header("Location: index.php");
    }
    else{
        $upit = "SELECT * FROM kolamarke";
        $prepare = $con -> prepare($upit);
        $prepare -> execute();
        $rez = $prepare-> fetchAll(PDO::FETCH_ASSOC);
        $ukupnoRedova = $prepare->rowCount();
        $ukupnoStrana = ceil($ukupnoRedova/$limit);
        
        if (!isset($_GET['page'])) {
            $page = 1;
        } 
        else{
            $page = $_GET['page'];
        }

        $start = ($page-1)*$limit;

        $stmt = $con->prepare("SELECT * FROM kolamarke ORDER BY marka ASC LIMIT $start, $limit");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_OBJ);
        
        $results = $stmt->fetchAll();     
        $no = $page > 1 ? $start+1 : 1;


?>

    <form>
        <div class="container min-vh-100 mt-3">
            <table class="table">
                <tr>
                    <td colspan="3"><input type="text" id="markeUnos" class="form-control w-100" placeholder="Unesite marku"></td>
                    <td colspan="2"><button class="btn btn-dark w-100" id="unesiMarku">Unesi u bazu</button></td>
                </tr>
                <tr>
                    <td colspan="5"><span id="markaGreska" class="text-center text-danger"></span></td>
                </tr>
                <tr>
                    <td>#</td>
                    <td>KolaMarkeID</td>
                    <td>Naziv marke</td>
                    <td>Izmeni</td>
                    <td>Obriši</td>
                </tr>
                <?php foreach($results as $r){

                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td data-baza='$r->markaID'>$r->markaID</td>";
                    echo "<td data-id='polje$r->markaID'>$r->marka</td>";
                    echo "<td><button class='btn btn-dark w-100' name='markeUpdate' id='$r->markaID'>Izmeni</button></td>";
                    echo "<td><button class='btn btn-dark w-100' name='markeDelete' id='$r->markaID'>Obriši</button></td>";
                    echo "</tr>";
                    $no++; 
                } ?>
            </table>
            <ul class="pagination">
                <li class="btn-page"><a href="?page=1" class="btn">Prva</a></li>
                
                <?php for($i=1; $i<=$ukupnoStrana; $i++){?>
                    
                    <li class="<?= $page == $i ? 'btn-dark' : ''; ?>"><a class="btn" href="<?= '?page='.$i; ?>"><?= $i; ?></a></li>
                <?php }?>
                <li><a class="btn" href="?page=<?= $ukupnoStrana; ?>">Poslednja</a></li>
            </ul>
        </div>
    </form>
<?php
    }
    include ("pages/footer.php");
?>