<?php

$dbUser = "root";
$dbPass = "";

$dbh = new PDO("mysql:host=localhost;dbname=blog", $dbUser, $dbPass);

$stmt = $dbh->prepare("SELECT * FROM :table");
$stmt->execute([":table"=>"users"]);
$posts = $stmt->fetchAll();

?>

