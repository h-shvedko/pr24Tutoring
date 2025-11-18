<?php

require_once "data.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($username)) {
        $errors[] = "Benutzername darf nicht leer sein.";
    } elseif(strlen(trim($username)) < 5) {
        $errors[] = "Benutzername muss mindestens 5 Zeichen lang sein.";
    }

    if(empty($pass1)) {
        $errors[] = "Pasword darf nicht leer sein.";
    } elseif(strlen(trim($pass1)) < 8) {
        $errors[] = "Pasword muss mindestens 8 Zeichen lang sein.";
    }

    if(empty($pass2)) {
        $errors[] = "Passwort-Wiederholung darf nicht leer sein.";
    } elseif(strlen(trim($pass2)) < 8) {
        $errors[] = "Passwort-Wiederholung muss mindestens 8 Zeichen lang sein.";
    }

    if(!empty($pass1) && !empty($pass2) && $pass1 != $pass2) {
        $errors[] = "Die Passwörter stimmen nicht überein.";
    }

    if(empty($errors)) {
        $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
        $passwordToStore = $hashedPassword;
        $usernameToStore = $username;
        $userRecord = $usernameToStore . "|||" . $passwordToStore; // test1|||123123123

        file_put_contents($dataFile, $userRecord, FILE_APPEND | LOCK_EX);

        $successMessage = "Willkommen, " . htmlspecialchars($username) . "! Dein Konto wurde erstellt.";
        $username = '';
    }
}

require_once "index.php";
