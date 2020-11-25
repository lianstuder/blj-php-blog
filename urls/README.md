# Tabelle mit den Blog URLs

- Verbinde dich mit der Datenbank

Die Zugangsdaten sind bereits im Code enthalten.

```php
$pdo = new PDO('https://mysql2.webland.ch/?dbname=d041e_listuder', "d041e_listuder", "12345_Db!!!", [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
```

- URLs aus der Datenbank erhalten

Nach der Herstellung einer Verbindung zur Datenbank, kannst du mit einer SQL Query die URLs aus der Datenbank ziehen.

```php
$sqlQuery = $pdo->prepare("SELECT * FROM :blog_url");
$sqlQuery->execute([":blog_url" => "blog_url"]);
$urls = $sqlQuery->fetchAll();
```

Nun hast du ein Array mit sämtlichen Blog URLs.