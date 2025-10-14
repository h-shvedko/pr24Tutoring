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
// Auch hier gilt: In einer echten Anwendung gehören diese Daten in eine sichere Konfigurationsdatei.
$host = "localhost";
$dbname = "test_db";
$username = "root";
$password = "";
$charset = "utf8mb4"; // Wichtig für die korrekte Darstellung von Sonderzeichen

// 2. DSN (Data Source Name) erstellen
// Der DSN beschreibt, zu welcher Datenbank eine Verbindung hergestellt werden soll.
// Er macht PDO flexibel, da man hier einfach den Treiber (z.B. 'mysql', 'pgsql') austauschen kann.
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// Optionen für das PDO-Verhalten
$options = [
    // 3. Fehlerbehandlung auf Exceptions umstellen
    // Das ist der wichtigste Vorteil von PDO! Bei einem Fehler wird eine PDOException ausgelöst,
    // die wir mit einem try-catch-Block elegant abfangen können.
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

    // Stellt sicher, dass die Ergebnisse standardmäßig als assoziatives Array geliefert werden.
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    // Deaktiviert die Emulation von Prepared Statements für mehr Sicherheit (optional, aber empfohlen).
    PDO::ATTR_EMULATE_PREPARES => false,
];

// 4. Verbindung in einem try-catch-Block aufbauen
try {
    // Hier wird das PDO-Objekt erstellt und die Verbindung aufgebaut.
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    // Wenn die Verbindung fehlschlägt, wird die Exception gefangen.
    // die() beendet das Skript und gibt eine sichere Fehlermeldung aus.
    // In einer Live-Umgebung würde man den Fehler loggen, anstatt ihn auszugeben.
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

echo "<h1>Unsere Produkte</h1>";

// 5. SQL-Abfrage ausführen und Ergebnisse verarbeiten
try {
    // Wir verwenden hier ein einfaches query(), da keine Benutzereingaben verarbeitet werden.
    // Bei Abfragen mit WHERE-Klauseln wären Prepared Statements (prepare() & execute()) zwingend!
    $stmt = $pdo->query("SELECT id, name, price FROM products");

    // 6. Prüfen, ob Ergebnisse vorhanden sind
    if ($stmt->rowCount() > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Produktname</th><th>Preis</th></tr>";

        // Die foreach-Schleife ist bei PDO sehr elegant, da das Statement-Objekt direkt durchlaufen werden kann.
        foreach ($stmt as $row) {
            echo "<tr>";
            // htmlspecialchars() ist auch hier essenziell zur Absicherung gegen XSS.
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            // number_format() zur sauberen Darstellung des Preises.
            echo "<td>" . number_format($row['price'], 2, ',', '.') . " €</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Es wurden keine Produkte in der Datenbank gefunden.";
    }
} catch (\PDOException $e) {
    // Fängt Fehler ab, die während der Abfrage auftreten könnten (z.B. Tabelle nicht gefunden).
    die("Fehler bei der Datenbankabfrage: " . $e->getMessage());
}

// 7. Verbindung schließen
// Bei PDO ist ein explizites Schließen nicht notwendig. Die Verbindung wird automatisch beendet,
// sobald das Skript endet und das $pdo-Objekt nicht mehr referenziert wird.
// Man kann es erzwingen, indem man das Objekt auf null setzt: $pdo = null;
