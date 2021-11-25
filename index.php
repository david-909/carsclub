<?php session_start();
    include ("pages/header.php");
    include ("pages/nav.php");
?>
    
    <div class="container min-vh-100">
        <div class="row mt-3">
            <?php
                include_once ("data/connection.php");
                $upit = "SELECT * FROM kola k INNER JOIN slike s ON k.kolaID=s.kolaID INNER JOIN users u ON u.userID = k.userID INNER JOIN kolamarke m ON m.markaID = k.markaID INNER JOIN pogon p ON p.pogonID = k.pogonID INNER JOIN menjac mn ON mn.menjacID = k.menjacID INNER JOIN karoserija kr ON kr.karoserijaID = k.karoserijaID";
                $rez = $con -> query($upit)->fetchAll();
                #var_dump($rez);
                
                foreach($rez as $r){
                    
                    $upit1 = "SELECT * FROM slike WHERE kolaID = :kola";
                    $prepare = $con -> prepare($upit1);
                    $prepare -> bindParam(":kola", $r->kolaID);
                    $prepare -> execute();
                    $rez1 = $prepare -> fetch();
                    if($r->slikaID == $rez1->slikaID){
                        echo "<div class='col-lg-4 h-100'>";
                        echo "<div class='text-center' style='height: 250px;'>";
                        echo "<a href='$r->putanja' name='colorbox' rel='$r->kolaID'><img src='$rez1->putanja' alt='$r->model' class='img-fluid text-center mh-100'/></a>";
                        echo "</div>";
                            echo "<table class='w-100 mt-4 mb-4'>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Marka:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->marka</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Model:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->model</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Godina proizvodnje:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->godina</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Kilometraža:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->km</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Kubikaža:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->kubikaza</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Konjska snaga:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->snaga</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Pogon:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->pogon</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Menjač:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->menjac</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Karoserija:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->karoserija</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Boja:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->boja</td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo "<td class='text-center'>Vlasnik:</td>";
                                    echo "<td class='text-center font-weight-bold'>$r->ime $r->prezime</td>";
                                echo "</tr>";
                            echo "</table>";
                        echo "</div>";
                    }
                    else{
                        echo "<a href='$r->putanja' name='colorbox' rel='$r->kolaID'></a>";
                    }
                }
            ?>
            
        </div>
    </div>

<?php
    include ("pages/footer.php")
?>