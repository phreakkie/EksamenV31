<?php
$title ="Opret bruger";
$meta ="Opret en bruger på siden FancyClothes.dk";
require "./includes/_header.php";
?>
<form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="mx-auto my-20">

<div class="grid grid-cols-2 pb-5 mb-5 mx-6 border-b border-white">
    <label for="username" class="text-3xl ">Brugernavn:</label>
    <input required type="text" name="username" value="" class="border text-gray-700 w-80" placeholder="Indsæt nyt brugernavn...">
</div>
<div class="grid grid-cols-2 pb-5 mb-5 mx-6 border-b border-white">
    <label for="password" class="text-3xl ">Password:</label>
    <input required type="password" name="password" value="" class="border text-gray-700 w-80" placeholder="Indsæt nyt password...">
</div>
<div class="grid grid-cols-2 pb-5 mb-5 mx-6 border-b border-white">
    <label for="passwordRepeat" class="text-3xl ">Gentag password:</label>
    <input required type="password" name="passwordRepeat" value="" class="border text-gray-700 w-80" placeholder="Gentag password...">
</div>

<div class="grid grid-cols-2 pb-5 mb-5 mx-6 ">
    <label for="accessLevel" class="text-3xl  ">Brugerens accesslevel (1-3):</label>
    <select required name="accessLevel" class="border text-gray-700 w-80">
        <option value="3">3</option>
        <option value="2">2</option>
        <option value="1">1</option>
    </select>
</div>
<button name="submit" class="py-4 px-8 ml-6 border rounded border-black hover:bg-white/10 transition">Opret</button>

</form>



<?php

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $accessLevel = $_POST['accessLevel'];
    $hash1 = password_hash($password, PASSWORD_DEFAULT);


    $stmt = getUser($username);

    if ($row = $stmt->fetch()) {
        echo "<p class='text-red-500 mx-auto py-6 px-8 bg-red-200 border rounded-lg border-red-500 absolute top-1/2 left-1/4 '>Brugernavnet findes allerede</p>";
    } else if ($password != $passwordRepeat) {
        echo "<p class='text-red-500 mx-auto py-6 px-8 bg-red-200 border rounded-lg border-red-500 absolute top-1/2 left-1/4 '>Passwords matcher ikke</p>";
    } else {
        
        createUser($username, $hash1, $accessLevel);
        header("location: index.php");
    }
}
require "./includes/_footer.php";
