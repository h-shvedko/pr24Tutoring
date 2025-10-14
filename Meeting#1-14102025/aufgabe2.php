<?php


/**
 * Aufgabe 2: Sicheres Kontaktformular
 * Ziel: Hier zeigst du deine Fähigkeiten in der Verarbeitung von Benutzereingaben und der serverseitigen Validierung.
 *
 * Beschreibung:
 * Erstelle ein einfaches HTML-Kontaktformular mit den Feldern Name, E-Mail und Nachricht.
 * Die Formulardaten sollen per POST-Methode an ein PHP-Skript gesendet werden.
 *
 * Das PHP-Skript muss die Eingaben serverseitig validieren und dabei folgende Regeln sicherstellen:
 *
 * Das Feld Name darf nicht leer sein.
 *
 * Das Feld Nachricht darf nicht leer sein.
 *
 * Die E-Mail-Adresse muss ein gültiges Format haben.
 *
 * Bei erfolgreicher Validierung soll eine Erfolgsmeldung angezeigt werden.
 * Andernfalls sollen klare Fehlermeldungen für den Benutzer erscheinen.
 */


// 1. Prüfen, ob das Formular abgeschickt wurde
// Wir stellen sicher, dass der Code nur ausgeführt wird, wenn die Anfrage per POST erfolgt.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 2. Fehler-Array initialisieren
    // In diesem Array sammeln wir alle Validierungsfehler.
    $fehler = [];

    // 3. Formulardaten aus dem $_POST-Superglobal auslesen
    // Wir verwenden trim(), um unnötige Leerzeichen am Anfang und Ende zu entfernen.
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $nachricht = trim($_POST["nachricht"]);

    // 4. Validierungsregeln anwenden
    // Regel 1: Name darf nicht leer sein.
    if (empty($name)) {
        $fehler[] = "Bitte geben Sie Ihren Namen ein.";
    }

    // Regel 2: E-Mail muss gültig sein.
    // filter_var() ist die empfohlene PHP-Funktion zur Validierung von E-Mails.
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $fehler[] = "Bitte geben Sie eine gültige E-Mail-Adresse ein.";
    }

    // Regel 3: Nachricht darf nicht leer sein.
    if (empty($nachricht)) {
        $fehler[] = "Bitte geben Sie eine Nachricht ein.";
    }

    // 5. Ergebnis ausgeben
    // Prüfen, ob das Fehler-Array leer ist.
    if (empty($fehler)) {
        // Keine Fehler gefunden -> Erfolgsmeldung
        echo "<h1>Vielen Dank, " . htmlspecialchars($name) . "!</h1>";
        echo "<p>Ihre Nachricht wurde erfolgreich gesendet.</p>";
        // Hier würde man in einer echten Anwendung die E-Mail versenden.
    } else {
        // Fehler gefunden -> Fehlermeldungen anzeigen
        echo "<h1>Fehler bei der Eingabe</h1>";
        echo "<p>Bitte korrigieren Sie die folgenden Fehler:</p>";
        echo "<ul>";
        foreach ($fehler as $err) {
            echo "<li>" . $err . "</li>";
        }
        echo "</ul>";
        echo '<a href="formular.php">Zurück zum Formular</a>';
    }
} else {
    // Falls das Skript direkt aufgerufen wird
    echo "<h1>Fehler</h1><p>Dieses Skript kann nur über das Kontaktformular aufgerufen werden.</p>";
}
