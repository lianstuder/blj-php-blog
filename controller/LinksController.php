<?php
// Requires seperate Database connection

$remoteDbUser = "d041e_listuder";
$remoteDbPass = "12345_Db!!!";

$pdo = new PDO("mysql:host=mysql2.webland.ch;dbname=d041e_listuder", $remoteDbUser, $remoteDbPass, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$sqlQuery = $pdo->query("SELECT * FROM `blog_url`");
$urls = $sqlQuery->fetchAll();
?>