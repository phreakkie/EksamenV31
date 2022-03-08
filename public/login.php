<?php
$title = "Log Ind";
$meta = "Log ind hos FancyClothes.dk";
require "./includes/_header.php";
require "./includes/_crud.php";

if (isset($_POST['submit'])) {
    $username = $_POST['formUsername'];
    $password = $_POST['formPassword'];
    login($username, $password);
}

?>


<?php
require "./includes/_footer.php";
