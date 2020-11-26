<h2>Latest Posts</h2>
<nav class="actions">
    <ul>
        <li><a href="?page=newPost.php">Neuer Post</a></li>
    </ul>
</nav>
<ul>
<?php foreach ($posts as $post): ?>
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
            <ul>
                <li><img src="./static/images/upvote.png" alt="upvote"></li>
                <li><img src="./static/images/downvote.png" alt="downvote"></li>
            </ul>
        </div>
    </li>
<?php endforeach; ?>
</ul>
