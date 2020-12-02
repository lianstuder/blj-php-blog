<?php
session_start();
$errors = array();


$user = 'd041e_listuder';
$password = '12345_Db!!!';

$pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=d041e_listuder', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

// Page parameter
$page = $_GET["page"] ?? "home.php";

$controllers = [
    "userVerification.php",
    "UserController.php",
    "PostController.php",
];

// Include controllers
foreach ($controllers as $index => $ctrlr) {
    include "./controller/$ctrlr"; 
}
    
$views = [
    "Home" => "home.php",
    "Andere Blogs" => "links.php"
];

if (verifyUserId($_SESSION["userId"], $pdo)) {
    $views["Post erstellen"] = "newPost.php";
    $views["Abmelden"] = "logout.php";

    $username = getUserByID($_SESSION["userId"], $pdo)["username"];
    $views[$username] = "home.php";
} else {
    $views["Anmelden"] = "login.php";
    $views["Registrieren"] = "register.php";
}

// Base template
include "./templates/app.php";
?>
 