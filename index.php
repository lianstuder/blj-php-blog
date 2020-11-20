<?php

include "./controller/db.php";

// Page parameter
$page = $_GET["page"] ?? "home.php";

$views = [
    "Home" => "home.php",
    "About" => "about.php"
];

function includeView($views, $view_name) {
    foreach ($views as $name => $view) {
        if ($view_name === $view) {
            // Include controller
            include "./controller/$view";

            // Include view
            return include "./views/$view";
        }
    }
}

// Base template
include "./templates/app.php";
?>
