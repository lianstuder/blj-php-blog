<h2>Registrieren</h2>
<?php if (sizeof($errors) > 0): ?>
<div class="error-box">
    <?php foreach($errors as $index => $error): ?>
    <p><?= $error ?></p>
    <?php endforeach; ?>
</div>
<?php endif; ?>
<form action="?page=register.php" method="POST">
    <label for="username">Benutzername</label>
    <input type="text" name="username" id="username">

    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    
    <label for="password">Passwort</label>
    <input type="password" name="password" id="password">

    <label for="repeatPassword">Passwort wiederholen</label>
    <input type="password" name="repeatPassword" id="repeatPassword">

    <input type="submit" name="register" value="Registrieren">
</form>