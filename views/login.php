<h2>Anmelden</h2>
<?php if (sizeof($errors) > 0): ?>
<div class="error-box">
    <?php foreach($errors as $index => $error): ?>
    <p><?= $error ?></p>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<form action="?page=login.php" method="POST">
    <label for="username">Benutzername</label>
    <input type="text" name="username" id="username">
    
    <label for="password">Passwort</label>
    <input type="password" name="password" id="password"></br></br>

    <input type="submit" name="login" value="Anmelden">
</form>