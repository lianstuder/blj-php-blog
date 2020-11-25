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
            <h3><?= htmlspecialchars($post["post_title"]); ?></h3>
            <small>Erstellt von <?= htmlspecialchars($post["post_created_by"]); ?> am <?= htmlspecialchars($post["post_created_at"]); ?></small>
        </div>
        <p class="post-body"><?= htmlspecialchars($post["post_content"]); ?></p>
    </li>
<?php endforeach; ?>
</ul>
