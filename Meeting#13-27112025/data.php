<?php

session_start();
//$_SESSION

// --- TEIL 1: DER PHP-TÜRSTEHER (Logik) ---

// Schritt 1: Initiieren
$username = $_POST['username'] ?? ""; // isset($_POST['username'] ? $_POST['username'] : "" => if(isset($_POST['username']])) $username = $_POST['username']) else $username = "";
$pass1 = $_POST['pass1'] ?? ""; // Passwörter werden nie "sticky" gemacht!
$pass2 = $_POST['pass2'] ?? "";

$loginUsername = $_POST['loginUsername'] ?? "";
$loginPassword = $_POST['loginPassword'] ?? "";

$errors = [];
$successMessage = "";

// Der Dateiname, in dem wir speichern
$dataFile = 'users.txt';
$idDataFile = 'idData.txt';

if (isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SERVER['REQUEST_URI'] != '/dashboard.php') {
    header("Location: dashboard.php");
} elseif (empty($_SESSION['username']) && !in_array($_SERVER['REQUEST_URI'], ['/login.php', '/registrierung.php'])) {
    header("Location: login.php");
}
