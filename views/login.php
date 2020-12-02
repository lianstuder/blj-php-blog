<?php if (sizeof($errors) > 0): ?>
<div class="error-box">
    <?php foreach($errors as $index => $error): ?>
    <p><?= $error ?></p>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<?php
if ($success === false): ?>
<h2>Neuer Post</h2>
<form action="?page=login.php" method="POST">
    <label for="username">Benutzername</label>
    <input type="text" name="username" id="username">
    
    <label for="password">Passwort</label>
    <input type="password" name="password" id="password"><br /><br />

    <input type="submit" name="login" value="Anmelden"><br />
    <small>Noch kein Account? <a href="?page=register.php">Registrieren</a></small>
</form>
<?php else: ?>
<h2>Du wurdest eingeloggt</h2>
<?php endif ?>