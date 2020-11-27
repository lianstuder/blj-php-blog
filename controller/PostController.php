<?php


function submitVote($voteTable) {
    if (isset($_POST["upvote"])) {
        $userId = $user[0]["userId"] ?? "";
        $postId = $post["postId"] ?? "";
    
        // Check if user already upvoted
        $sqlStmt = $pdo -> query("
            SELECT us.userId, ps.postId, postId, userId
            FROM tblUpvote
            INNER JOIN tblPost AS ps
            INNER JOIN tblUser AS us
            ON us.userId = userId AND ps.postId = postId 
        ");
        $userUpvotes = $sqlStmt->fetchAll();

        $sqlStmt = $pdo -> query("
            SELECT us.userId, ps.postId, postId, userId
            FROM tblDownvote
            INNER JOIN tblPost AS ps
            INNER JOIN tblUser AS us
            ON us.userId = userId AND ps.postId = postId 
        ");
        $userDownvotes = $sqlStmt->fetchAll();
    
        if ($result[0]["userId"] !== $userId && $result[0]["postId"] !== $postId) {
            $sqlStmt = $pdo->prepare("
            INSERT INTO `tblUpvote` VALUES (?, ?)
            ");
    
            if (!empty(trim($userId)) &&!empty(trim($postId))) {
                $sqlStmt->execute([
                    $postId,
                    $userId
                ]);
            }   
        }
    }  
}

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


// Upvotes and Downvotes
$quUpvotes = $pdo->query("
    SELECT *
    FROM tblUpvote
");
$upvotes = count($quUpvotes->fetchAll());

$quDownvotes = $pdo->query("
    SELECT *
    FROM tblDownvote
");
$downvotes = count($quDownvotes->fetchAll());

// User
if(isset($_SESSION["userId"]) && $_SESSION["userId"] !== null) {
    // Check validity of User ID Cookie
    $userId = $_SESSION["userId"];
    $quUser = $pdo->prepare("SELECT * FROM `tblUser` WHERE `userId` = :userId ");
    $quUser->execute([":userId" => $userId]);
    $user = $quUser->fetchAll();
    if (empty($user)) {
        die("Wer sind Sie? Sie existieren nicht in der Nutzer Datenbank :( Kontaktieren Sie den Support.");
        exit;
    }

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
}
?>
