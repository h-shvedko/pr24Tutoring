<?php
// 1. Session starten (um sie zu finden)
session_start();

// 2. Session leeren (Variablen löschen)
print_r($_SESSION);

// 3. Session vernichten (Datei auf Server löschen)
session_destroy();

header("Location: index.php");
