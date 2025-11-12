<?php

/**
 * Aufgabe 1: Der GET-Simulator (eine "Suchmaschine")
 *
 * Erstelle eine Datei suche.php.
 *
 * Schreibe ein HTML-Formular, das method="get" und action="suche.php" verwendet (es sendet die Daten an sich selbst).
 *
 * Gib dem Suchfeld den Namen: name="q".
 *
 * In derselben Datei (suche.php), schreibe PHP-Code über dem HTML-Formular.
 *
 * Prüfe mit isset($_GET['q']), ob überhaupt gesucht wurde.
 *
 * Wenn ja, hole $_GET['q'] und gib aus: <h2>Du hast nach "<?= htmlspecialchars($suchbegriff); ?>" gesucht.</h2>.
 *
 * Beobachte nach dem Senden deine URL!
 *
 *
 *
 * Aufgabe 2: Der POST-Simulator (ein "Login")
 *
 * Erstelle eine Datei login_form.php (das Formular) und login_check.php (die Verarbeitung).
 *
 * login_form.php soll method="post" und action="login_check.php" haben.
 *
 * Es braucht zwei Felder: name="user" und name="pass" (Typ password, damit man die Eingabe nicht sieht).
 *
 * In login_check.php:
 *
 * Hole $_POST['user'] und $_POST['pass'].
 *
 * Schreibe eine if-Bedingung: if ($user == "admin" && $pass == "geheim123").
 *
 * Wenn ja, gib "Login erfolgreich! Willkommen!" aus.
 *
 * else, gib "FEHLER: Falscher Benutzer oder Passwort!" aus.
 *
 * Beobachte deine URL! Sie ist sauber und zeigt das Passwort nicht an.
 */
