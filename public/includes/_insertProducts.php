<?php
if(!isset($_GET['filter'])){
    $stmt = getProduct();
}else{
    $category = $_GET['filter'];
    $stmt = getFilteredProduct($category);
}
while ($row = $stmt->fetch()) {
    
    $date = new DateTime($row['timestamp']);
    // $username = getUsername($row['userid'])->fetch();
    $date = $date->format('d-m-y');

    
?>
                <article>
                    <img src="./uploads/<?=$row['imgSrc']?>" alt="<?=$row['imgAlt']?>">
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
                            Oprettet af: <?php echo $row['dbUsername']?> d. <?php echo $date;?>
                        </div>
                        <p><?php echo $row['content']?>
                            <a href="#">Læs mere...</a></p>
                        <!-- Mulighed for sletning herunder -->
                    </div>
                </article>

                
<?php 
}