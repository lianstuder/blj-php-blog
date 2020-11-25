<?php
$errors = array();
$success = false;

$user = 'root';
$password = '';

$pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

// Existing posts
$stmt = $pdo->query('SELECT * FROM `tblPost`');
$posts = $stmt->fetchAll();


// New post
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $submittedValues = $_POST;

    foreach ($submittedValues as $index => $fieldValue) {
        $submittedValues[$index] = trim($fieldValue);
    }

    var_dump($errors);

    $success = true;
    $sqlStmt = $pdo -> prepare(
        "INSERT INTO `tblPost` (`postId`, `postCreatedBy`, `postCreatedOn`, `postTitle`, `postContent`) 
        VALUES (NULL, ?, current_timestamp(), ?, ?) ");

    $sqlStmt->execute([$_POST["postAuthor"], $_POST["postTitle"], $_POST["postContent"]]);
}
?>
