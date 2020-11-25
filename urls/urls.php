<?php 

$dbuser = "d041e_alfacalcastro";
$dbpass = "12345_Db!!!";

$pdo = new PDO("mysql:host=mysql2.webland.ch;dbname=d041e_listuder", $dbuser, $dbpass, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$sqlQuery = $pdo->prepare("SELECT * FROM :blog_url");
$sqlQuery->execute([":blog_url" => "blog_url"]);
$urls = $sqlQuery->fetchAll();
var_dump($urls);
?>