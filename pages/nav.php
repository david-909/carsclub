
<nav class="navbar navbar-expand-md bg-dark sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigacija">
            <span class="burger">
                <i class="fa fa-bars"></i>
            </span>
        </button>
        <div id="logo">
            <a href="index.php"><img src="assets/img/logo.png"/></a>
        </div>
        <div class="collapse navbar-collapse" id="navigacija">
            <ul class="navbar-nav ml-auto">
                <?php
                    try{
                        include_once ("data/connection.php");
                        $upit = "SELECT * FROM menu";
                        $rez = $con -> query($upit);
                        $rezultat = $rez->fetchAll();
                        foreach($rezultat as $r){
                            if(!isset($_SESSION['username']) AND ($r->href == "login.php" OR $r->href == "register.php" OR $r->href == "kontakt.php" OR $r->href == "onama.php" OR $r->href == "autor.php")){
                                echo "<li class='nav-item'><a class='nav-link txtboja' href='$r->href'>$r->title</a></li>";
                            }
                            else if(isset($_SESSION['username']) AND ($r->href == "postavka.php" OR $r->href =="logic/logout.php")){
                                echo "<li class='nav-item'><a class='nav-link txtboja' href='$r->href'>$r->title</a></li>";
                            }
                            else if(isset($_SESSION['username']) AND $_SESSION['role'] == 2 AND ($r->href =="panel.php" OR $r->href == "anketa.php")){
                                echo "<li class='nav-item'><a class='nav-link txtboja' href='$r->href'>$r->title</a></li>";
                            }
                            else if (isset($_SESSION['username']) AND $_SESSION['role'] == 1 AND ($r->href == "kontakt.php" OR $r->href == "onama.php" OR $r->href == "autor.php" OR $r->href == "anketa.php")){
                                echo "<li class='nav-item'><a class='nav-link txtboja' href='$r->href'>$r->title</a></li>";
                            }
                        }
                    }
                    catch(PDOException $e){
                        http_response_code(500);
                    }
                    
                ?>
            </ul>
            <form action="pretraga.php" method="GET" class="d-flex flex-row">
            <input class="form-control mr-sm-2 w-100" type="text" placeholder="Search" aria-label="Search" id="search" name="searchX">
            <input type='submit' class="btn btn-outline-danger my-2 my-sm-0 txtboja" value='Pretrazi'> 
            </form>
        </div>
    </nav>
    