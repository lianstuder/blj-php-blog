<?php
$success = false;

// Existing posts
$stmt = $pdo->query('SELECT * FROM `tblPost`');
$posts = $stmt->fetchAll();


// New post
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST["post"])) {
    $submittedValues = $_POST;

    foreach ($submittedValues as $index => $fieldValue) {
        $submittedValues[$index] = trim($fieldValue);
    }

    $success = true;
    $sqlStmt = $pdo -> prepare(
        "INSERT INTO `tblPost` (`postId`, `postCreatedBy`, `postCreatedOn`, `postTitle`, `postContent`, `postBanner`) 
        VALUES (NULL, ?, current_timestamp(), ?, ?, ?) ");

    $sqlStmt->execute([$_POST["postAuthor"], $_POST["postTitle"], $_POST["postContent"], $_POST["postBanner"]]);
}
?>
