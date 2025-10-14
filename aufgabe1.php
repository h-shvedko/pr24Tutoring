<?php

/**
 * Aufgabe 1: Die Summe der geraden Zahlen
 * Dein Ziel: In dieser Aufgabe kannst du deine Grundlagen im Umgang mit Arrays
 * und logischen Bedingungen unter Beweis stellen.
 *
 * Deine Aufgabe:
 * Schreibe eine PHP-Funktion, die du summeGeraderZahlen nennst. Diese Funktion
 * soll ein Array, das mit ganzen Zahlen gefüllt ist, als Parameter erhalten. Deine Aufgabe
 * ist es, dieses Array zu durchlaufen, alle geraden Zahlen zu finden und ihre Summe zu berechnen.
 * Am Ende soll deine Funktion ausschließlich diese Summe zurückgeben.
 *
 * Ein Beispiel zur Orientierung:
 * Wenn du das Array [1, 2, 3, 4, 5, 6] an deine Funktion übergibst, sollte sie
 * das Ergebnis 12 zurückliefern (weil 2 + 4 + 6 = 12 ist).
 */

//Musterlösung

/**
 * Berechnet die Summe aller geraden Zahlen in einem Array.
 *
 * @param array $zahlenArray Ein Array mit ganzen Zahlen.
 * @return int Die Summe der geraden Zahlen.
 */
function summeGeraderZahlen(array $zahlenArray): int
{
    // 1. Initialisierung der Summe
    // Wir starten mit einer Summe von 0, zu der wir später die geraden Zahlen addieren.
    $summe = 0;

    // 2. Durchlaufen des Arrays
    // Die foreach-Schleife ist ideal, um jedes Element eines Arrays nacheinander zu bearbeiten.
    // In jedem Durchlauf enthält die Variable '$zahl' den aktuellen Wert aus dem Array.
    foreach ($zahlenArray as $zahl) {
        // 3. Prüfung auf gerade Zahl
        // Der Modulo-Operator (%) gibt den Rest einer Division zurück.
        // Eine Zahl ist gerade, wenn sie durch 2 geteilt einen Rest von 0 hat.
        if ($zahl % 2 == 0) {
            // 4. Addition zur Summe
            // Wenn die Zahl gerade ist, addieren wir sie zu unserer Gesamtsumme.
            $summe += $zahl; // Kurzform für: $summe = $summe + $zahl;
        }
    }

    // 5. Rückgabe des Ergebnisses
    // Nachdem die Schleife alle Zahlen geprüft hat, geben wir das Endergebnis zurück.
    return $summe;
}

// --- Test der Funktion ---
$testZahlen = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$ergebnis = summeGeraderZahlen($testZahlen);

echo "Das Test-Array ist: " . implode(', ', $testZahlen) . "\n";
echo "Die Summe aller geraden Zahlen ist: " . $ergebnis; // Erwartete Ausgabe: 30 (2+4+6+8+10)

