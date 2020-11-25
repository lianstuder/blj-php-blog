<?php

// Page parameter
$page = $_GET["page"] ?? "home.php";

$views = [
    "Home" => "home.php",
    "About" => "about.php",
    "New Post" => "newPost.php"
];

$controllers = [
    "home.php"
];

function includeView($views, $controllers, $viewName) {
    foreach ($views as $name => $view) {
        if ($viewName === $view) {
            if (in_array($view, $controllers)) {
                // Include controller
                include "./controller/$view"; 
            }
            // Include view
            return include "./views/$view";
        }
    }
}

// Base template
include "./templates/app.php";
?>
