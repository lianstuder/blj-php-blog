<?php
if ($success === false): ?>
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

    <label for="postContent">Inhalt</label>
    <textarea name="postContent" id="postContent" placeholder="Arch > Gentoo" required></textarea>

    <!-- TODO: 
        - Drag and Drop Attachments / Images
    -->

    <label for="postBanner">Banner Image URL</label>
    <input type="text" name="postBanner" id="postBanner" placeholder="https://somedomain.com/image.jpg">

    <input type="submit" value="Posten" name="post">
</form>
<?php else: ?>
<h2>Posten erfolgreich</h2>
<p><a href="?page=home.php">Zur Startseite</a></p>
<?php endif ?>