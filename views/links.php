<ul class="blogs-list">
<?php foreach ($urls as $url): ?>
    <li>
        <a target="_blank" href="<?= htmlspecialchars($url["blogUrl"]) ?>">
            <?= htmlspecialchars($url["blogAuthor"]) ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>