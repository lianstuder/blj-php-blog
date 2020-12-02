<?php

// Error handling
$success = false;

// Existing posts
$quPosts = $pdo->query("
    SELECT tu.username, tp.postId, tp.postTitle, tp.postContent, tp.postCreatedOn, tp.postBanner
    FROM tblUser AS tu
    INNER JOIN tblPost AS tp
    ON tu.userId = tp.postCreatedBy
    ORDER BY postCreatedOn DESC
");
$posts = $quPosts->fetchAll();

// Insert post
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST["post"])) {
    $user = $user[0];

    // Input data cleanup 
    $submittedValues = $_POST;
    foreach ($submittedValues as $index => $fieldValue) {
        $submittedValues[$index] = trim($fieldValue);
    }

    $sqlStmt = $pdo -> prepare(
        "INSERT INTO `tblPost` (`postId`, `postCreatedBy`, `postCreatedOn`, `postTitle`, `postContent`, `postBanner`) 
        VALUES (NULL, ?, current_timestamp(), ?, ?, ?) ");

    $sqlStmt->execute([
        $user["userId"],
        $_POST["postTitle"], 
        $_POST["postContent"], 
        $_POST["postBanner"]
    ]);
}

?>
