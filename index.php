<?php
include "./controller/DatabaseController.php";
session_start();


// Page parameter
$page = $_GET["page"] ?? "home.php";

$views = [
    "Home" => "home.php",
    "Anmelden" => "login.php",
    "Registrieren" => "register.php",
    "Andere Blogs" => "links.php",
    "Post erstellen" => "newPost.php"
];

$controllers = [
    "PostController.php",
    /* "LinksController.php", */
    "UserController.php"
];

$errors = array();

// Include controllers
foreach ($controllers as $index => $ctrlr) {
    include "./controller/$ctrlr"; 
}
    
// Base template
include "./templates/app.php";
?>
 