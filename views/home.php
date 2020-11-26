<h2>Latest Posts</h2>
<nav class="actions">
    <ul>
        <li><a href="?page=newPost.php">Neuer Post</a></li>
    </ul>
</nav>
<ul>
<?php foreach ($posts as $post): 
if (isset($_POST["upvote"])) {
    $userId = $user[0]["userId"] ?? "";
    $postId = $post["postId"] ?? "";

    // Check if user already voted
    $sqlStmt = $pdo -> query("
        SELECT us.userId, ps.postId, postId, userId
        FROM tblUpvote
        INNER JOIN tblPost AS ps
        INNER JOIN tblUser AS us
        ON us.userId = userId AND ps.postId = postId 
    ");
    $result = $sqlStmt->fetchAll();

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
?>
    <li class="post-container">
        <div class="post-header">
            <h3><?= htmlspecialchars($post["postTitle"]); ?></h3>
            <small>Erstellt von <?= htmlspecialchars($post["username"]); ?> am <?= htmlspecialchars($post["postCreatedOn"]); ?></small>
        </div>
        <?php if (strlen(trim($post["postBanner"])) > 0): ?>
            <img src="<?= htmlspecialchars($post["postBanner"]) ?>" alt="content not found" class="post-banner">
        <?php endif; ?>
        <p class="post-body"><?= htmlspecialchars($post["postContent"]); ?></p>
        <div class="post-footer">
            <form action="?page=home.php" method="POST">
                <button type="submit" name="upvote"><img src="./static/images/upvote.png" alt="upvote"><?= $upvotes ?></button>
                <button type="submit" name="downvote"><img src="./static/images/downvote.png" alt="downvote"><?= $downvotes ?></button>
            </form>
        </div>
    </li>
<?php endforeach; ?>
</ul>
