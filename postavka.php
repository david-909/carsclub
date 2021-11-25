<?php session_start();
    include ("pages/header.php");
    include ("pages/nav.php");
    include ("data/connection.php");

    
?>
    <div class="container min-vh-100">
    <?php
        if(isset($_SESSION['aktivan']) AND $_SESSION['aktivan'] == 1){
    ?>
        <div class="row">
        <form class="w-100" enctype="multipart/form-data">
            <div class="form-group">
                <label>Marka: </label>
                <select class="custom-select" id="markaSelect">
                    <option value="0">Izaberite</option>
                    <?php
                        $upit = "SELECT * FROM kolamarke";
                        $rez = $con -> query($upit);
                        foreach ($rez as $r){
                            echo "<option value='$r->markaID'>$r->marka</option>";
                        }
                    ?>
                </select>
                <span class="text-danger" id="markaGreska"></span>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" class="form-control" id="model" placeholder="Unesite model">
                <span class="text-danger" id="modelGreska"></span>
            </div>
            <div class="form-group">
                <label for="emailRegister">Izaberite godinu proizvodnje</label>
                <select class="custom-select" id="godinaSelect">
                    <option value="0">Izaberite</option>
                    <?php
                        for($i=1950; $i<=2021;$i++){
                            echo "<option value='$i'>$i</option>";
                        } 
                    ?>
                </select>
                <span class="text-danger" id="godinaGreska"></span>
            </div>
            <div class="form-group">
                <label for="kilometraza">Kilometraža</label>
                <input type="text" class="form-control" id="kilometraza" placeholder="Unesite kilometražu">
                <span class="text-danger" id="kilometrazaGreska"></span>
            </div>
            <div class="form-group">
                <label for="kubikaza">Kubikaža</label>
                <input type="text" class="form-control" id="kubikaza" placeholder="Unesite kubikažu">
                <span class="text-danger" id="kubikazaGreska"></span>
            </div>
            <div class="form-group">
                <label for="snaga">Snaga motora(KS)</label>
                <input type="text" class="form-control" id="snaga" placeholder="Unesite konjsku snagu motora">
                <span class="text-danger" id="snagaGreska"></span>
            </div>
            <div class="form-group">
                <label for="boja">Boja</label>
                <input type="text" class="form-control" id="boja" placeholder="Unesite boju">
                <span class="text-danger" id="bojaGreska"></span>
            </div>
            <div class="form-group">
                <label>Pogon: </label>
                <select class="custom-select" id="pogonSelect">
                    <option value="0">Izaberite</option>
                    <?php
                        $upit = "SELECT * FROM pogon";
                        $rez = $con -> query($upit);
                        foreach ($rez as $r){
                            echo "<option value='$r->pogonID'>$r->pogon</option>";
                        }
                    ?>
                </select>
                <span class="text-danger" id="pogonGreska"></span>
            </div>
            <div class="form-group">
                <label>Menjač: </label>
                <select class="custom-select" id="menjacSelect">
                    <option value="0">Izaberite</option>
                    <?php
                        $upit = "SELECT * FROM menjac";
                        $rez = $con -> query($upit);
                        foreach ($rez as $r){
                            echo "<option value='$r->menjacID'>$r->menjac</option>";
                        }
                    ?>
                </select>
                <span class="text-danger" id="menjacGreska"></span>
            </div>
            <div class="form-group">
                <label>Karoserija: </label>
                <select class="custom-select" id="karoserijaSelect">
                    <option value="0">Izaberite</option>
                    <?php
                        $upit = "SELECT * FROM karoserija";
                        $rez = $con -> query($upit);
                        foreach ($rez as $r){
                            echo "<option value='$r->karoserijaID'>$r->karoserija</option>";
                        }
                    ?>
                </select>
                <span class="text-danger" id="karoserijaGreska"></span>
            </div>
            <div class="form-group">
                <label>Postavite slike</label><br>
                <input type="file" id='files' name="files[]" multiple>
                <span class="text-danger" id="slikaGreska"></span>
            </div>
            
            
            <button class="btn btn-dark w-100 mt-5 mb-5" id="dugmePostavka">Posalji</button>
            
        </form>
        <div id="unosUspesan"></div>
        </div>
        <?php
            }
            else {
                echo "<h5 class='text-danger text-center'>Molimo aktivirajte nalog</h5>";
            }
        ?>
    </div>
<?php
    include ("pages/footer.php");
?>