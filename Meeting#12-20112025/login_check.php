<?php

require_once "data.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($loginUsername)) {
        $_SESSION['errors'][] = "Benutzername darf nicht leer sein.";
    }

    if(empty($loginPassword)) {
        $_SESSION['errors'][] = "Password darf nicht leer sein.";
    }

    $userFound = false;
    $usersDBData = file_get_contents($dataFile);
    $usersData = explode("\n", $usersDBData);
    if($usersDBData !== false) {
        foreach($usersData as $userString) {
            $user = explode("|||", $userString);
            $username = $user[0];
            $password = $user[1];

            if($loginUsername == $username && password_verify($loginPassword, $password)) {
                $_SESSION['username'] = $username;
                $userFound = true;
            }
        }
    }

    if(empty($errors) && $userFound) {
        require_once "dashboard.php";
        exit;
    }

    if(!$userFound) {
        $_SESSION['errors'][] = "Benutzername oder Passwort ist falsch.";
    }
}

require_once "login.php";
