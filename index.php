<?php
// ===============================================
// 1. SETUP & DATUM (date)
// ===============================================
echo "====================================\n";
echo "Ihr persönlicher Tages-Report-Generator\n";

// Wir nutzen date(), um den aktuellen Zeitstempel zu holen.
$heute = date("d.m.Y H:i");
echo "Report wird erstellt am: " . $heute . " Uhr\n";
echo "====================================\n\n";


// ===============================================
// 2. INTERAKTIVE EINGABEN (fgets, trim)
// ===============================================

// Frage 1: Name
echo "Wie ist dein Name?\n";
$benutzerName = trim(fgets(STDIN));

// Frage 2: Aufgaben-String
echo "\nHallo " . $benutzerName . "!\n";
echo "Bitte gib deine heutigen Aufgaben ein.\n";
echo "Trenne jede Aufgabe mit einem Komma (z.B. Einkaufen,Lernen,Putzen)\n";
$aufgabenString = trim(fgets(STDIN));

// Frage 3: Eine weitere Aufgabe
echo "\nSuper. Welche eine Aufgabe möchtest du noch hinzufügen?\n";
$extraAufgabe = trim(fgets(STDIN));


// ===============================================
// 3. VERARBEITUNG (explode, array_push, count, sort)
// ===============================================
echo "\n... verarbeite deine Eingaben ...\n\n";

// A. Den String in ein Array zersägen (explode)
$aufgabenArray = explode(",", $aufgabenString);

// B. Die extra Aufgabe an das Ende des Arrays packen (array_push)
array_push($aufgabenArray, $extraAufgabe);

// C. Die Liste sortieren für eine saubere Ansicht (sort)
sort($aufgabenArray);

// D. Die Gesamtanzahl zählen (count)
$anzahl = count($aufgabenArray);


// ===============================================
// 4. AUSGABE & REPORT (strtoupper, implode)
// ===============================================
echo "====================================\n";
// Wir nutzen strtoupper(), um den Namen hervorzuheben
echo "REPORT FÜR: " . strtoupper($benutzerName) . "\n";
echo "====================================\n";

echo "Du hast heute " . $anzahl . " Aufgaben zu erledigen:\n\n";

// Wir geben die sortierte Liste aus (foreach aus UE 2)
foreach ($aufgabenArray as $aufgabe) {
    echo "  [ ] " . $aufgabe . "\n";
}

// Zum Schluss nutzen wir implode(), um eine Zusammenfassung zu erstellen
$zusammenfassung = implode(" | ", $aufgabenArray);
echo "\nZusammenfassung: " . $zusammenfassung . "\n";
echo "====================================\n";

