<?php
declare(strict_types=1);

require_once 'RegistrierungClass.php';
require_once 'VipRegistrierungClass.php';
require_once 'data.php';

$registrierung = new RegistrierungClass('Test Eingabe', '123123123', '123123123');
$registrierung->register();

$vipRegistrierung = new VipRegistrierungClass('VIPUser', 'vipPass123', 'vipPass123');
$vipRegistrierung->register();


//Ergebnis kommt hier

/**
 * ### **Aufgabe 1: Die Basis-Klasse (`User.php`)**
 *
 * Erstelle eine Klasse `User`. Sie repräsentiert einen ganz normalen Benutzer.
 *
 *  **Eigenschaften (protected):**
 *  `$username` (string)
 *  `$email` (string)
 *  `$id` (int) – *Tipp: Kannst du im Konstruktor random generieren oder übergeben.*
 *  **Konstruktor:** Setzt Username und Email.
 *  **Methoden:**
 *  Getter für alle Eigenschaften (`getUsername`, `getEmail`, `getId`).
 *  Eine Methode `getRole()`, die einfach den String `"Kunde"` zurückgibt.
 *  Eine Methode `getHtmlRow()`, die einen HTML-Tabellen-String (`<tr><td>...</td></tr>`) zurückgibt, der die Daten des Users enthält.
 *
 * ### **Aufgabe 2: Die Spezialisierung (`Admin.php`)**
 *
 * Erstelle eine Klasse `Admin`, die von `User` erbt (`extends`).
 *
 *  **Zusätzliche Eigenschaft:**
 *  `$permissionLevel` (int, z.B. 1-10).
 *  **Methoden überschreiben:**
 *  Überschreibe `getRole()`: Sie soll nun `"Administrator (Level X)"` zurückgeben.
 *  *(Optional)* Passe `getHtmlRow()` an, damit die Zeile z.B. fett gedruckt ist oder eine andere Hintergrundfarbe hat.
 */
