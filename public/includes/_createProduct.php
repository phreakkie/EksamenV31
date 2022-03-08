<?php
require "./includes/_crud.php";
?>

<div class="createArticle container">

        <h3 class="center errorMsg">Opret ny vare:</h3>
        <form action="<?php htmlentities($_SERVER['PHP_SELF'])?>" method="post">
            <div>
                <label for="imgSrc">Billede</label>
                <input type="text" id="imgSrc" name="imgSrc" placeholder="Vælg billede" required>
            </div>
            <div>
                <label for="imgAlt">Alt tekst</label>
                <input type="text" id="imgAlt" name="imgAlt" placeholder="Billedets alttekst..." required>
            </div>
            <div>
                <label for="heading">Overskrift</label>
                <input type="text" id="heading" name="heading" placeholder="Overskrift..." required>
            </div>
            <div>
                <label for="content">Brødtekst</label>
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Brødtekst..."></textarea>
            </div>
            <div>
                <label for="stars">Antal stjerner</label>
                <select name="stars" id="stars">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="category">Kategori</label>
                <select name="category" id="category" required>
                    <option value="jakker">Jakker</option>
                    <option value="bukser">Bukser</option>
                    <option value="skjorter">Skjorter</option>
                    <option value="strik">Strik</option>
                    <option value="tshirts">T-shirts og tanktops</option>
                    <option value="tasker">Tasker</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Opret" name="value">
            </div>
        </form>

    </div>
    </div>

    <?php

        if (isset($_POST['value'])) {
            $content = $_POST['content'];
            $heading = $_POST['heading'];
            $category = $_POST['category'];
            $stars = $_POST['stars'];
            $src = $_POST['imgSrc'];
            $alt = $_POST['imgAlt'];
            insertProduct($content, $heading, $category, $stars, $src, $alt);
            // heading("location:index.php");
            }
