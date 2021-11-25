<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include ("pages/header.php");
    include ("pages/nav.php");
?>
<div class="container min-vh-100">
<?php
    
    if(isset($_SESSION["username"])){

        $username = $_SESSION["username"];
        //AJAX I UPDATE GLASAO
        try{
            $upit = "SELECT glasao FROM users WHERE username = '$username'";
            $glasao = $con -> query($upit) ->fetch();

            if($glasao->glasao == 0){
                $upit1 = "SELECT * FROM anketa a INNER JOIN odgovori o ON a.anketaID = o.anketaID";
                $rez = $con -> query($upit1) -> fetchAll();
                #var_dump($rez[0]->pitanje);
                echo "<h3 class='text-center text-danger mt-5'>".$rez[0]->pitanje."</h3>";
                echo "<table class='table'>";
                foreach($rez as $r){
                    echo "<tr>";
                    echo "<td><input type='radio' name='anketa' value='$r->odgovor'><span class='ml-3'>$r->odgovor</span></td>";
                    echo "</tr>";
                }
                echo "<tr><td><button id='posaljiAnketu' class='w-100 btn btn-dark'>Pošalji anketu</button></td></tr>";
                echo "</table>";
                
            }
            if($glasao->glasao == 1){
                echo "<h3 class='text-center text-danger mt-5'>Rezulati ankete</h3>";
                $upit2 = "SELECT odgovor FROM odgovori WHERE anketaID = 1";
                $rez2 = $con -> query($upit2) -> fetchAll();
                $procenat = [];
                $upit3 = "SELECT * , (SELECT (ROUND(o.glasovi/SUM(glasovi),2)*100) FROM odgovori) as proc FROM odgovori o WHERE anketaID = 1";
                $rez = $con ->query($upit3) ->fetchAll();
                foreach($rez as $r){
                    array_push($procenat , $r->proc);
                }

                echo "<table class='table'>";
                for($i = 0; $i<count($rez);$i++){
                    echo "<tr>";
                    echo "<td class='h6 mt-1' width='15%'>".$rez[$i]->odgovor."</td>";
                    echo "<td class='results text-left'>";
                    echo "<div class='bg-dark text-left font-weight-bold p-2 rounded-right' style='width:".$procenat[$i]."%'>".round($procenat[$i])."%</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
            }
        }
        catch(PDOException $e){
            http_response_code(500);
        }
   }
   else{
       header("Location: index.php");
   }
?>
<span id="anketaGreska"></span>
</div>
<?php
    include ("pages/footer.php");
?>