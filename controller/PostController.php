<?php
$success = false;

// Existing posts
$quPosts = $pdo->query("
    SELECT tu.username, tp.postTitle, tp.postContent, tp.postCreatedOn, postBanner
    FROM tblUser AS tu
    INNER JOIN tblPost AS tp
    ON tu.userId = tp.postCreatedBy
    ORDER BY postCreatedOn DESC
");
$posts = $quPosts->fetchAll();

// User
$userId = $_SESSION["userId"];
$quUser = $pdo->prepare("SELECT * FROM `tblUser` WHERE `userId` = :userId ");
$quUser->execute([":userId" => $userId]);
$user = $quUser->fetchAll()[0];

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

    $sqlStmt->execute([
        $author["username"],
        $_POST["postTitle"], 
        $_POST["postContent"], 
        $_POST["postBanner"]
    ]);
}
?>
