<?php
if(!isset($_SESSION['username'])){  
    if (isset($_POST['submit'])) {
        $username = $_POST['formUsername'];
        $password = $_POST['formPassword'];
        login($username, $password);
}}

?>

<div class="login container">
    <form action="" method="post">
        <label for="formUsername">Bruger:</label>
        <input type="text" id="formUsername" name="formUsername" placeholder="Brugernavn" required>
        <label for="formPassword">Password:</label>
        <input type="password" id="formPassword" name="formPassword" placeholder="Password" required>
        <input type="submit" name="submit" value="Log ind">
    </form>
    <a id="newUser" href="register.php">Ny bruger?</a>
</div>

<?php
