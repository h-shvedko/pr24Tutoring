<?php

require_once "data.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($loginUsername)) {
        $_SESSION['errors'][] = "Benutzername darf nicht leer sein.";
    }

    if(empty($loginPassword)) {
        $_SESSION['errors'][] = "Password darf nicht leer sein.";
    }

    //@TODO: user in DB finden und identifizieren, falls user existiert dann zum Dashboard weiterleiten, falls nicht exestiert dann zum login weiterleiten

    if(empty($errors)) {
        $_SESSION['username'] = $loginUsername;
        require_once "dashboard.php";
        exit;
    }
}

require_once "login.php";
