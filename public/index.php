<?php
$meta = "Velkommen til FancyClothes.dk";
$title= "Forside | FancyClothes.dk";
require "./includes/_header.php";
?>
    

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
                        <li><a href="index.php?filter=jakker">Jakker</a></li>
                        <li><a href="index.php?filter=bukser">Bukser</a></li>
                        <li><a href="index.php?filter=skjorter">Skjorter</a></li>
                        <li><a href="index.php?filter=strik">Strik</a></li>
                        <li><a href="index.php?filter=tshirts">T-shirts & Tank tops</a></li>
                        <li><a href="index.php?filter=tasker">Tasker</a></li>
                    </ul>
                </div>
            </div>
<?php if(isset($_GET['filter'])){

} ?>
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
    
<?php
require "./includes/_footer.php";
?>
