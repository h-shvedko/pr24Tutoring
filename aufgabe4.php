<?php


/**
 * Aufgabe 4: Die Produktdatenbank
 * Dein Ziel: Hier kannst du zeigen, wie du eine Verbindung zu einer Datenbank herstellst und Daten daraus ausliest.
 *
 * Deine Aufgabe:
 * Schreibe ein PHP-Skript, das sich mit einer MySQL-Datenbank verbindet.
 * Nachdem die Verbindung steht, soll dein Skript alle Einträge aus einer
 * Tabelle namens products auslesen und die Ergebnisse übersichtlich auf der Webseite anzeigen.
 *
 * Bitte gehe von den folgenden Gegebenheiten aus (du musst die Datenbank nicht selbst anlegen):
 *
 * Datenbankname: test_db
 *
 * Tabellenname: products
 *
 * Spalten in der Tabelle: id, name, price
 *
 * Wichtiger Hinweis: Bitte achte auf einen sauberen und sicheren Code.
 * Nutze für die Datenbankabfrage entweder MySQLi oder PDO mit Prepared Statements,
 * um Sicherheit zu gewährleisten. Gib die ausgelesenen Produkte am Ende zum Beispiel
 * in einer einfachen HTML-Tabelle oder als Liste aus.
 */


// 1. Datenbank-Zugangsdaten
// In einer echten Anwendung sollten diese Daten niemals direkt im Code stehen,
// sondern in einer separaten Konfigurationsdatei außerhalb des Web-Verzeichnisses.
$servername = "localhost"; // oder die IP des DB-Servers
$username = "root";        // Dein Datenbank-Benutzername
$password = "";            // Dein Datenbank-Passwort
$dbname = "test_db";       // Der Name der Datenbank

// 2. Verbindung zur Datenbank herstellen
// Wir erstellen ein neues mysqli-Objekt.
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Verbindung prüfen
// Es ist extrem wichtig, direkt nach dem Verbindungsversuch auf Fehler zu prüfen.
// 'die()' beendet das Skript sofort und gibt eine Fehlermeldung aus.
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

echo "<h1>Unsere Produkte</h1>";

// 4. SQL-Abfrage definieren
// Wir wählen die Spalten aus, die wir benötigen. 'SELECT *' sollte vermieden werden.
$sql = "SELECT id, name, price FROM products";

// 5. Abfrage ausführen
// Die query()-Methode sendet die SQL-Anweisung an die Datenbank.
// Das Ergebnis ist ein mysqli_result-Objekt oder 'false' bei einem Fehler.
$result = $conn->query($sql);

// 6. Ergebnisse verarbeiten und ausgeben
// Wir prüfen, ob die Abfrage mindestens eine Zeile zurückgegeben hat.
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Produktname</th><th>Preis</th></tr>";

    // Die while-Schleife läuft, solange fetch_assoc() eine Ergebniszeile findet.
    // fetch_assoc() gibt jede Zeile als assoziatives Array zurück (Spaltenname => Wert).
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // htmlspecialchars() auch hier verwenden, um XSS bei Daten aus der DB zu verhindern!
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . number_format($row["price"], 2, ',', '.') . " €</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Es wurden keine Produkte in der Datenbank gefunden.";
}

// 7. Verbindung schließen
// Gibt die von der Datenbankverbindung genutzten Ressourcen wieder frei.
// Dies ist gute Praxis und wichtig bei Skripten mit hohem Traffic.
$conn->close();
