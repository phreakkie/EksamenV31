<?php
$meta = "Velkommen til FancyClothes.dk";
$title= "Forside | FancyClothes.dk";
require "./includes/_header.php";
?>
    <div class="top container">
        <div class="language">
            <div class="flag">
                <img src="img/ikon.png" alt="Dansk ikon">
                <span>Dansk</span>
            </div>
            <span>DKK</span>
        </div>
        <div class="search">
            <input type="text" placeholder="Indtast søgning"><input type="submit" value="Søg">
        </div>
    </div>
    <hr>
    <div class="container home flex items-center">
        <a href="index.php"><img src="img/homeIcon.png" alt="Forside ikon"></a>

        <!-- Velkomsthilsen vha brugernavn -->
        <?php 
        if(isset($_SESSION['username'])){ ?>
            <p class="pl-4 text-lg">Velkommen <span class="text-red-500 uppercase"><?=$_SESSION['username']?></span></p>
            <?php
        }
        ?>
        <h2></h2>
    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <li class="active"><a href="index.php">Forside</a></li>
                <li><a href="#">Produkter</a></li>
                <li><a href="#">Nyheder</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li><a href="#">Om os</a></li>
                <?php if(isset($_SESSION['username'])){
                    echo "<li><a href='logout.php' class='logoutBtn'>Log ud</a></li>";
                    
                }else {
                         echo "<li><a href='#' class='loginBtn'>Log ind</a></li>";
                         echo "<li><a href='register.php' class='loginBtn'>Opret bruger</a></li>";

                     }
                      ?>
            </ul>
        </nav>
        <div class="basket">
            <div class="basketContent">
                <p>Din indkøbskurv er tom</p>
            </div>
            <div class="shopIcon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <?php include "./includes/_login.php";
    ?>
    <hr>
    <div class="container">
        <ul class="slider" id="slider">
            <li><img src="img/slide1.jpg" alt=""></li>
            <li><img src="img/slide2.jpg" alt=""></li>
            <li><img src="img/slide3.jpg" alt=""></li>
        </ul>
    </div>
    <hr class="hide400">
    <h1 class="tagline">FancyClothes.DK - tøj, kvalitet, simpelt!</h1>
    <hr>

    <!-- Hvis Session['username'] er sat viser den _createProducts, som indeholder at oprette et produkt -->
<?php if(isset($_SESSION['username'])){
    require "./includes/_createProduct.php";
} ?>
    
    <main class="container">
        <aside>
            <div class="categories">
                <div class="catTop">
                    <h4>Kategorier:</h4>
                </div>
                <div class="catMain">
                    <ul>
                        <li><a href="#">Jakker</a></li>
                        <li><a href="#">Bukser</a></li>
                        <li><a href="#">Skjorter</a></li>
                        <li><a href="#">Strik</a></li>
                        <li><a href="#">T-shirts & Tank tops</a></li>
                        <li><a href="#">Tasker</a></li>
                    </ul>
                </div>
            </div>

            <div class="newsletter">
                <div class="newsTop">
                    <h4>Tilmeld nyhedsbrev</h4>
                </div>
                <div class="newsMain">
                    <form action="">
                        <input type="text" placeholder="Navn">
                        <input type="email" placeholder="Email">
                </div>
                <div class="newsBottom">
                    <input type="submit" value="Tilmeld">
                    </form>
                </div>
            </div>
        </aside>
        <div class="products">
            <h3>INSPIRATION</h3>
            <hr>
            <div class="inspiration">
                <div class="catMen">
                    <img src="img/kategoriHerre.jpg" alt="">
                    <h5>Herretøj</h5>
                    <div class="action">Lær mere</div>
                </div>
                <div class="catWomen">
                    <img src="img/kategoriKvinde.jpg" alt="">
                    <h5>Kvindetøj</h5>
                    <div class="action">Lær mere</div>
                </div>
            </div>
            <div class="frontProducts">
            <!-- Indsætter produkterne på siden -->
            <?php require "./includes/_insertProducts.php" ?>
            </div>
           
        
        
        
            
        </div>
    </main>
    <hr>
    <footer>
        <div class="contact container">
            <ul>
                <li class="bold">FancyClothes.dk</li>
                <li>Skrædderstien 7</li>
                <li>4321 Fredensvang</li>
                <li>E-mail: info@fancyness@gmail.com</li>
                <li>Sitemap</li>
            </ul>
            <div class="social">
                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                <i class="fa fa-twitter-square" aria-hidden="true"></i>
                <i class="fa fa-youtube-square" aria-hidden="true"></i>
            </div>
        </div>
<?php
require "./includes/_footer.php";
?>
