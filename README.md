# PHP Grundlagen - Tutoring Repository

**pr24 GmbH Tutoring Program**

## Zweck des Repositories

Dieses Repository dient als **zentrale Lernressource für Tutoring-Sitzungen**. Es enthält Musterlösungen und ausführliche Erklärungen zu PHP-Aufgaben, die während der Tutoring-Meetings besprochen werden.

**Für Studierende**: Die hier bereitgestellten Lösungen können jederzeit zur Wiederholung, zum Verständnis oder zur Überprüfung eigener Lösungsansätze herangezogen werden. Jede Datei enthält detaillierte Kommentare und Erklärungen, die das selbstständige Lernen unterstützen.

Das Repository wird kontinuierlich mit neuen Meetings erweitert (z.B. `Meeting#1-14102025`, `Meeting#2-21102025`, etc.), sodass alle behandelten Themen chronologisch dokumentiert und zugänglich bleiben.

---

## Meeting #1 - 14.10.2025: PHP Grundlagen

### Überblick

Dieses erste Meeting behandelt vier grundlegende PHP-Übungen, die wichtige Konzepte der Webentwicklung mit PHP abdecken. Jede Aufgabe ist eine vollständige, dokumentierte Musterlösung mit ausführlichen Erklärungen.

## Aufgaben

### Aufgabe 1: Die Summe der geraden Zahlen
**Datei**: `Meeting#1-14102025/aufgabe1.php`

Implementierung einer Funktion zur Berechnung der Summe aller geraden Zahlen in einem Array.

**Lernziele**:
- Array-Verarbeitung mit `foreach`
- Modulo-Operator für gerade/ungerade Zahlen
- Funktionen mit Type Hints

**Beispiel**:
```php
$zahlen = [1, 2, 3, 4, 5, 6];
echo summeGeraderZahlen($zahlen); // Ausgabe: 12
```

### Aufgabe 2: Sicheres Kontaktformular
**Dateien**:
- `Meeting#1-14102025/formular.php` (HTML-Formular)
- `Meeting#1-14102025/aufgabe2.php` (PHP-Validierung)

Serverseitige Validierung eines Kontaktformulars mit Fehlerbehandlung.

**Lernziele**:
- POST-Datenverarbeitung
- Input-Validierung
- XSS-Prävention mit `htmlspecialchars()`
- E-Mail-Validierung mit `filter_var()`

**Validierungsregeln**:
- Name darf nicht leer sein
- E-Mail muss gültiges Format haben
- Nachricht darf nicht leer sein

### Aufgabe 3: Objektorientierter Benutzer
**Datei**: `Meeting#1-14102025/aufgabe3.php`

Implementation einer User-Klasse mit Kapselung und Methoden.

**Lernziele**:
- Klassen und Objekte
- Konstruktoren
- Private Eigenschaften (Encapsulation)
- Getter/Setter-Methoden

**Klassenstruktur**:
```php
class User {
    private string $username;
    private string $email;

    public function __construct(string $username, string $email)
    public function setUsername(string $newUsername): void
    public function getUserDetails(): string
}
```

### Aufgabe 4: Die Produktdatenbank
**Dateien**:
- `Meeting#1-14102025/aufgabe4.php` (MySQLi-Variante)
- `Meeting#1-14102025/aufgabe4PDO.php` (PDO-Variante)

Datenbankverbindung und Produktliste mit zwei verschiedenen Ansätzen.

**Lernziele**:
- Datenbankverbindung herstellen
- SQL-Abfragen ausführen
- Ergebnisse verarbeiten und ausgeben
- Unterschiede zwischen MySQLi und PDO
- Fehlerbehandlung bei Datenbankoperationen

**Datenbank-Setup**:
```sql
CREATE DATABASE test_db;
USE test_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);
```

## Installation und Ausführung

### Voraussetzungen

- PHP 7.4 oder höher
- MySQL/MariaDB (für Aufgabe 4)
- Webserver (Apache, Nginx) oder PHP Built-in Server

### Lokaler PHP-Server

```bash
cd "Meeting#1-14102025"
php -S localhost:8000
```

Dann im Browser öffnen:
- `http://localhost:8000/aufgabe1.php`
- `http://localhost:8000/formular.php`
- `http://localhost:8000/aufgabe3.php`
- `http://localhost:8000/aufgabe4.php`
- `http://localhost:8000/aufgabe4PDO.php`

### XAMPP/WAMP/MAMP

1. Ordner in `htdocs` (XAMPP) oder `www` (WAMP) verschieben
2. Apache und MySQL starten
3. Im Browser aufrufen: `http://localhost/[ordnername]/Meeting#1-14102025/`

### Datenbank einrichten (für Aufgabe 4)

1. phpMyAdmin öffnen oder MySQL-Konsole nutzen
2. SQL-Befehle aus dem Abschnitt "Datenbank-Setup" ausführen
3. Beispieldaten einfügen:

```sql
INSERT INTO products (name, price) VALUES
    ('Laptop', 899.99),
    ('Maus', 24.99),
    ('Tastatur', 79.99),
    ('Monitor', 299.99);
```

4. Datenbankzugangsdaten in den Aufgabe-4-Dateien anpassen:
```php
$servername = "localhost";
$username = "root";         // Dein MySQL-Benutzername
$password = "";             // Dein MySQL-Passwort
$dbname = "test_db";
```

## Technische Details

### Verwendete PHP-Features

- **Type Declarations**: Funktionen und Methoden mit Typ-Hinweisen
- **Arrays**: Assoziative Arrays, Array-Iteration
- **OOP**: Klassen, Konstruktoren, Sichtbarkeit (private/public)
- **Superglobals**: `$_POST`, `$_SERVER`
- **Datenbankzugriff**: MySQLi und PDO

### Sicherheitsmaßnahmen

- **XSS-Prävention**: `htmlspecialchars()` bei allen Ausgaben
- **Input-Validierung**: `trim()`, `empty()`, `filter_var()`
- **SQL-Injection-Schutz**: Vorbereitet für Prepared Statements
- **Fehlerbehandlung**: Try-catch-Blöcke, Verbindungsprüfungen

### Code-Qualität

Alle Lösungen beinhalten:
- Ausführliche deutsche Kommentare
- Schritt-für-Schritt-Erklärungen
- Best Practices
- Fehlerbehandlung
- Sicherheitsbewusstsein

## Lernpfad

Die Aufgaben bauen aufeinander auf:

1. **Aufgabe 1**: PHP-Grundlagen (Variablen, Schleifen, Funktionen)
2. **Aufgabe 2**: Formularverarbeitung und Validierung
3. **Aufgabe 3**: Objektorientierte Programmierung
4. **Aufgabe 4**: Datenbankintegration

## Häufige Probleme

### "Connection refused" bei Aufgabe 4
- MySQL-Server läuft nicht → XAMPP/WAMP starten
- Falsche Zugangsdaten → In den Dateien anpassen

### "Class 'PDO' not found"
- PDO-Extension nicht aktiviert → In `php.ini` aktivieren:
  ```ini
  extension=pdo_mysql
  ```

### Formular zeigt keine Fehler
- `error_reporting` aktivieren:
  ```php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  ```

### Umlaute werden falsch angezeigt
- UTF-8 Encoding sicherstellen:
  - HTML: `<meta charset="UTF-8">`
  - Datenbank: `charset=utf8mb4`
  - PHP-Dateien: Als UTF-8 speichern

## Weiterführende Themen

Nach diesen Grundlagen bieten sich an:
- Sessions und Authentifizierung
- File-Upload mit Validierung
- AJAX und JSON
- RESTful APIs
- MVC-Pattern
- PHP-Frameworks (Laravel, Symfony)
- Composer und Dependency Management
- Unit-Testing mit PHPUnit

## Projekt-Informationen

- **Erstellt**: 14.10.2025
- **Organisation**: pr24 GmbH
- **Zweck**: Tutoring - Test Aufgabe
- **Sprache**: Deutsch (Code-Kommentare und Dokumentation)
- **Lizenz**: Educational Use

## Kontakt & Support

Dieses Projekt ist Teil eines Tutoring-Programms. Bei Fragen zu den Aufgaben oder Problemen bei der Ausführung, wenden Sie sich an Ihren Tutor.

## Repository-Struktur

```
14102025 - test Aufgabe/
├── README.md                    # Diese Datei
├── CLAUDE.md                    # Technische Entwickler-Dokumentation
├── Meeting#1-14102025/          # Erstes Meeting: PHP Grundlagen
│   ├── aufgabe1.php            # Summe gerader Zahlen
│   ├── aufgabe2.php            # Formular-Validierung
│   ├── aufgabe3.php            # OOP User-Klasse
│   ├── aufgabe4.php            # Datenbank mit MySQLi
│   ├── aufgabe4PDO.php         # Datenbank mit PDO
│   └── formular.php            # HTML-Kontaktformular
├── Meeting#2-21102025/          # Zukünftige Meetings werden hier hinzugefügt
├── Meeting#3-[Datum]/
└── ...                          # Weitere Meetings folgen
```

**Hinweis**: Diese Struktur wird mit jedem neuen Tutoring-Meeting erweitert. Jeder Ordner enthält die Aufgaben und Musterlösungen des jeweiligen Meetings.

## Checkliste für Anfänger

- [ ] PHP-Version prüfen: `php -v`
- [ ] Webserver installiert (XAMPP/WAMP oder PHP Built-in)
- [ ] MySQL/MariaDB läuft
- [ ] Datenbank `test_db` erstellt
- [ ] Tabelle `products` mit Beispieldaten gefüllt
- [ ] Alle PHP-Dateien sind im richtigen Verzeichnis
- [ ] Browser geöffnet und localhost aufgerufen
- [ ] Bei Fehlern: Error Reporting aktiviert

---

**Viel Erfolg beim Lernen!** 🚀
