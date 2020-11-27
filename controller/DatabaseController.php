<?php 
$user = 'd041e_listuder';
$password = '12345_Db!!!';

$pdo = new PDO('mysql:host=mysql2.webland.ch;dbname=blog', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
?>