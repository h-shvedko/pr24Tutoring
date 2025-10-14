<?php


/**
 * Aufgabe 3: Objektorientierter Benutzer
 * Dein Ziel: In dieser Aufgabe geht es um dein Verständnis der objektorientierten Programmierung (OOP) in PHP.
 *
 * Deine Aufgabe:
 * Definiere eine PHP-Klasse mit dem Namen User. Diese Klasse soll zwei private
 * Eigenschaften (properties) besitzen: username und email.
 *
 * Integriere die folgenden Methoden in deine Klasse:
 *
 * Einen Konstruktor (__construct), der beim Erstellen eines neuen User-Objekts
 * die Werte für username und email direkt setzt.
 *
 * Eine öffentliche Methode namens setUsername, mit der man den Benutzernamen eines bestehenden
 * Objekts nachträglich ändern kann.
 *
 * Eine öffentliche Methode namens getUserDetails, die einen schön formatierten Satz zurückgibt,
 * der die Daten des Benutzers enthält (z. B. "Benutzer: maxmustermann, E-Mail: max@test.de").
 *
 * Zum Schluss erstelle ein Test-Objekt deiner Klasse und rufe die Methoden auf, um zu zeigen,
 * dass alles wie erwartet funktioniert.
 */


class User
{
    // 1. Eigenschaften (Properties)
    // 'private' bedeutet, dass auf diese Variablen nur von innerhalb der Klasse zugegriffen werden kann.
    // Dies nennt man Datenkapselung (Encapsulation) und ist ein Kernprinzip von OOP.
    private string $username;
    private string $email;

    // 2. Konstruktor-Methode
    // Diese magische Methode wird automatisch aufgerufen, wenn ein neues Objekt mit 'new User()' erstellt wird.
    // Sie ist ideal, um dem Objekt seinen Anfangszustand zu geben.
    public function __construct(string $username, string $email)
    {
        // '$this' bezieht sich auf das aktuelle Objekt.
        // Wir weisen den übergebenen Werten den Eigenschaften des Objekts zu.
        $this->username = $username;
        $this->email = $email;
    }

    // 3. Öffentliche Methode (Setter)
    // Eine 'public' Methode kann von außerhalb der Klasse aufgerufen werden.
    // Diese Methode erlaubt eine kontrollierte Änderung des Benutzernamens.
    public function setUsername(string $newUsername): void
    {
        // Hier könnte man zusätzliche Logik einbauen, z.B. prüfen, ob der Name gültig ist.
        $this->username = $newUsername;
    }

    // 4. Öffentliche Methode (Getter)
    // Diese Methode gibt formatierte Informationen über das Objekt zurück.
    public function getUserDetails(): string
    {
        return "Benutzer: " . $this->username . ", E-Mail: " . $this->email;
    }
}

// --- Anwendung der Klasse ---

// Erstellen eines neuen Objekts (Instanziierung)
// Der Konstruktor wird hier aufgerufen.
$user1 = new User('maxmustermann', 'max@test.de');

// Aufruf der Getter-Methode, um den Anfangszustand auszugeben
echo $user1->getUserDetails(); // Ausgabe: Benutzer: maxmustermann, E-Mail: max@test.de
echo "<br>";

// Aufruf der Setter-Methode, um eine Eigenschaft zu ändern
$user1->setUsername('max_der_beste');

// Erneuter Aufruf der Getter-Methode, um den geänderten Zustand zu sehen
echo $user1->getUserDetails(); // Ausgabe: Benutzer: max_der_beste, E-Mail: max@test.de

