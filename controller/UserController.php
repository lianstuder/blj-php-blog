<?php 
$success = false;

// Register
// TODO: INPUT VALIDATION
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST["register"])) {
    // $success = true;
    $sqlStmt = $pdo -> prepare(
        "INSERT INTO `tblUser` (`userId`, `username`, `userEmail`, `passwordHash`) 
        VALUES (?, ?, ?, ?) ");

    $token = openssl_random_pseudo_bytes(8);
    $token = bin2hex($token);

    $sqlStmt->execute([
        $token, 
        $_POST["username"], 
        $_POST["email"], 
        password_hash($_POST["password"], PASSWORD_BCRYPT)
    ]);
}

// Login
// TODO: INPUT VALIDATION
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST["login"])) {
    $sqlStmt = $pdo -> prepare("SELECT * FROM `tblUser` WHERE `username` = :usrName OR `userEmail` = :usrName AND `passwordHash` = :pwHash");

    $inputPasswordHash = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $sqlStmt->execute([
        ":usrName" => $_POST["username"],
        ":pwHash" => $inputPasswordHash
    ]);

    $result = $sqlStmt->fetchAll();
    if ($result) {
        $_SESSION["userId"] = $result[0]["userId"];
        $success = true;
    }
}
?>