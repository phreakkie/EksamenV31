<?php

$stmt = getProduct();
while ($row = $stmt->fetch()) {
    $date = new DateTime($row['timestamp']);
    
?>

                <article>
                    <img src="<?=$row['imgSrc']?>" alt="<?=$row['imgAlt']?>">
                    <div class="info">
                        <h3><?=$row['heading']?></h3>
                        <div class="stars">
                        <?php
                            switch($row['stars']){
                                case 1: ?>
                                  <i class='fa fa-star' aria-hidden='true'></i>
                                  <i class='fa fa-star-o' aria-hidden='true'></i>
                                  <i class='fa fa-star-o' aria-hidden='true'></i>
                                  <i class='fa fa-star-o' aria-hidden='true'></i>
                                  <i class='fa fa-star-o' aria-hidden='true'></i>
                                    <?php
                                  break;
                                case 2: ?>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star-o' aria-hidden='true'></i>
                                   <i class='fa fa-star-o' aria-hidden='true'></i>
                                   <i class='fa fa-star-o' aria-hidden='true'></i>
                                    <?php
                                   break;
                                case 3: ?>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star-o' aria-hidden='true'></i>
                                   <i class='fa fa-star-o' aria-hidden='true'></i>
                                    <?php
                                   break;   
                                case 4: ?>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star-o' aria-hidden='true'></i>
                                    <?php
                                   break;
                                case 5: ?>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                   <i class='fa fa-star' aria-hidden='true'></i>
                                    <?php
                                   break;   
                            }?>
                        </div>
                    </div>
                    <div class="description">
                        <div class="published">
                            Oprettet af: <?=$_SESSION['username']?> den. <?php echo $date->format('d/m/y');?>
                        </div>
                        <p><?php echo stripslashes(htmlspecialchars($row['content']))?>
                            <a href="#">Læs mere...</a></p>
                        <!-- Mulighed for sletning herunder -->
                    </div>
                </article>

                
<?php 
}