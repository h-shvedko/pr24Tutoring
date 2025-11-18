<?php
// --- TEIL 1: DER PHP-TÜRSTEHER (Logik) ---

// Schritt 1: Initiieren
$username = $_POST['username'] ?? ""; // isset($_POST['username'] ? $_POST['username'] : "" => if(isset($_POST['username']])) $username = $_POST['username']) else $username = "";
$pass1 = $_POST['pass1'] ?? ""; // Passwörter werden nie "sticky" gemacht!
$pass2 = $_POST['pass2'] ?? "";

$errors = [];
$successMessage = "";

// Der Dateiname, in dem wir speichern
$dataFile = 'users.txt';
