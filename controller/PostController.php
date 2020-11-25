<?php
$errors = array();
$success = false;

$user = 'root';
$password = '';

$pdo = new PDO('mysql:host=localhost;dbname=blog', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

// Existing posts
$stmt = $pdo->query('SELECT * FROM `posts`');
$posts = $stmt->fetchAll();


// New post
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $submittedValues = $_POST;

    foreach ($submittedValues as $index => $fieldValue) {
        $submittedValues[$index] = trim($fieldValue);
        if (strlen($fieldValue) === 0) {
            switch ($index) {
                case "postTitle":
                    $errors[] = "Bitte geben Sie einen Titel ein.";
                    break;

                case "postAuthor":
                    $errors[] = "Sie müssen einen Authoren festlegen.";
                    break;

                case "postContent":
                    $errors[] = "Bitte geben Sie einen Post Inhalt ein.";
                    break;
            }
        }
    }

    $success = true;
    $sqlStmt = $pdo -> prepare(
        "INSERT INTO `posts` (`post_id`, `post_created_by`, `post_created_at`, `post_title`, `post_content`) 
        VALUES (NULL, ?, current_timestamp(), ?, ?) ");

    $sqlStmt->execute([$_POST["postAuthor"], $_POST["postTitle"], $_POST["postContent"]]);
}
?>
