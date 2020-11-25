<?php

// Page parameter
$page = $_GET["page"] ?? "home.php";

$views = [
    "Home" => "home.php",
    "Post erstellen" => "newPost.php"
];

$controllers = [
    "PostController.php",
];

function includeView($views, $controllers, $viewName) {
    // Include controllers
    foreach ($controllers as $index => $ctrlr) {
        include "./controller/$ctrlr"; 
    }
    
    // Include view
    foreach ($views as $index => $view) {
        if ($viewName === $view) {
            return include "./views/$view";
        }
    }
}

// Base template
include "./templates/app.php";
?>
 