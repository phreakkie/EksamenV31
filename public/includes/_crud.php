<?php
require "./includes/_connect.php";


function login($username, $password)
{
    global $connection;
    $sql = "SELECT * FROM users WHERE dbUsername = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->execute();

    if (empty($row = $stmt->fetch())) {
        echo "<p class='text-red-500 mx-auto w-96 py-6 px-8 bg-red-200 border rounded-lg border-red-500 text-center'>Brugernavn eller Password er forkert</p>";
    } else if (password_verify($password, $row['dbPassword'])) {
        session_start();
        $_SESSION['username'] = $row['dbUsername'];
        $_SESSION['accesslevel'] = $row['accesslevel'];
        $_SESSION['userid'] = $row['id'];
        header("location: index.php");
    } else {
        echo "<p class='text-red-500 mx-auto w-96 py-6 px-8 bg-red-200 border rounded-lg border-red-500 text-center'>Brugernavn eller Password er forkert</p>";
    }
}

function createUser($username, $hash1, $accessLevel)
{
    global $connection;
    $sql = "INSERT INTO users (dbUsername, dbPassword, accessLevel) VALUES(?,?,?)";
    $stmt =  $connection->prepare($sql);
    $stmt->execute([$username, $hash1, $accessLevel]);
}

function getUser($username)
{
    global $connection;
    $sql = "SELECT * FROM users WHERE dbUsername = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->execute();
    return $stmt;
}

function insertProduct($content, $heading, $category, $stars, $src, $alt, $userid)
{
    global $connection;
    $sql = "INSERT INTO products(content, heading, category, stars, imgSrc, imgAlt, userid) VALUES(?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$content, $heading, $category, $stars, $src, $alt, $userid]);
}


function getProduct()
{
    global $connection;
    $sql = "SELECT products.*, users.dbUsername FROM products JOIN users ON products.userid = users.id";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    return $stmt;
}

function getFilteredProduct($category)
{
    global $connection;
    $sql = "SELECT products.*, users.dbUsername FROM products JOIN users ON products.userid = users.id WHERE category = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$category]);
    return $stmt;
}
function getUsername($userid)
{
    global $connection;
    $sql = "SELECT dbUsername FROM users WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$userid]);
    return $stmt;
}


