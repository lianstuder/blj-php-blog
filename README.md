# BLJ PHP Blog

## Checkliste

- [x] Als Benutzer will ich Blog-Beiträge lesen können.
- [ ] Als Blogger will ich Blog-Beiträge schreiben können.
- [x] Zu jedem Blog-Beitrag sollen der Name des Bloggers sowie Erstelldatum/-zeit angezeigt werden.
- [ ] Als Benutzer will ich eine Liste mit Links zu den Blogs meiner BLJ-Kollegen sehen.
- [ ] Als Blogger will ich Bilder aus dem Internet verlinken können, um meine Beiträge interessanter zu machen.
- [ ] Als Benutzer will ich einen Blog-Beitrag bewerten können. 2
- [ ] Als BLJ-Coach will ich, dass die Link-Liste aller BLJ-Blogs (siehe A004) zentral abgelegt und dynamisch erstellt wird. 2
- [ ] Als Benutzer will ich auf einen Blog-Beitrag antworten können (Kommentarfunktion). 2
- [ ] Als Blog-Entwickler will ich, dass andere Entwickler alle Beiträge meines Blogs über eine JSON-Schnittstelle abrufen können. 3
- [ ] Als Benutzer will ich auch die Blog-Beiträge aller anderen BLJ-Blogs sehen. Diese werden über die JSON-Schnittstelle abgeholt. 3
- [ ] Als Blogger will ich mich einloggen, um Blog-Beiträge zu schreiben, damit niemand in meinem Namen bloggen kann. 3
- [ ] Als Blogger will ich, das mein Passwort verschlüsselt in der Datenbank abgelegt wird. 3
- [ ] Als Blogger will ich mein Passwort ändern können. 3
- [ ] Als Benutzer will ich einen Blog-Beitrag kommentieren können. 3
- [ ] Als Blogger will ich per E-Mail informiert werden, wenn eine meiner Beiträge bewertet/kommentiert wurde. 3
- [ ] Als Benutzer will ich mich registrieren können, um selber als Blogger Beiträge schreiben zu können. 3

## Blog URLs DB

So kannst du dich mit der URL Datenbank verbinden:

- Verbinde dich mit der Datenbank

Die Zugangsdaten sind bereits im Code enthalten.

```php
$dbuser = "d041e_listuder";

// ACHTUNG: DU MUST HIER NOCH DAS PASSWORT EINSETZEN. DU FINDEST ES AUF DISCORD IM INFO CHANNEL
$dbpass = "";

$pdo = new PDO("mysql:host=mysql2.webland.ch;dbname=d041e_listuder", $dbuser, $dbpass, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
```

- URLs aus der Datenbank erhalten

Nach der Herstellung einer Verbindung zur Datenbank, kannst du mit einer SQL Query die URLs aus der Datenbank ziehen.

```php
$sqlQuery = $pdo->query("SELECT * FROM `blog_url`");
$urls = $sqlQuery->fetchAll();
```

Der Code sollte am Schluss also etwa so aussehen:

```php
<?php
$dbuser = "d041e_listuder";

// ACHTUNG: DU MUST HIER NOCH DAS PASSWORT EINSETZEN. DU FINDEST ES AUF DISCORD IM INFO CHANNEL
$dbpass = "";

$pdo = new PDO("mysql:host=mysql2.webland.ch;dbname=d041e_listuder", $dbuser, $dbpass, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$sqlQuery = $pdo->query("SELECT * FROM `blog_url`");
$urls = $sqlQuery->fetchAll();
?>
```

Nun hast du ein Array mit sämtlichen Blog URLs. Die Verarbeitung der Daten überlasse ich euch.
