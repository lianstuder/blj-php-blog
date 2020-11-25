
<?php if ($success === false): ?>
<h2>Neuer Post</h2>
<?php if (sizeof($errors) > 0): ?>
<div class="error-box">
    <?php foreach($errors as $index => $error): ?>
    <p><?= $error ?></p>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<form action="?page=newPost.php" method="POST">
    <label for="postTitle">Titel</label>
    <input type="text" name="postTitle" id="postTitle" placeholder="Mein neuer Post" required>

    <label for="postAuthor">Ihr Name</label>
    <input type="text" name="postAuthor" id="PostAuthor" placeholder="Noah Buchs" required>

    <label for="postContent">Inhalt</label>
    <textarea name="postContent" id="postContent" placeholder="Arch > Gentoo" required></textarea>

    <input type="submit" value="Posten">
</form>
<?php else: ?>
<h2>Posten erfolgreich</h2>
<p><a href="?page=home.php">Zur Startseite</a></p>
<?php endif ?>