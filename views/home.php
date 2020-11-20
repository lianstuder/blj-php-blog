<h2>Latest Posts</h2>
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
