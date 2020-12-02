<?php 
function verifyUserId($userId, $pdo) {
    if (strlen($userId) > 0) {
        $quUser = $pdo->prepare("SELECT * FROM `tblUser` WHERE `userId` = :userId ");
        $quUser->execute([":userId" => $userId]);
        $user = $quUser->fetchAll();
        if (empty($user)) {
            die("Wer sind Sie? Sie existieren nicht in der Nutzer Datenbank :( Kontaktieren Sie den Support.");
            exit;
        }
        return true;
    }
    return false;
}
?>