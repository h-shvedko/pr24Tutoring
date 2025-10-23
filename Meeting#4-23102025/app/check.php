<?php

// check.php
// Unser "Warenwirtschafts-Terminal" mit Farbausgabe.

// 1. DATEN & KONFIGURATION LADEN
// Lädt $lagerbestand UND alle Farb-Konstanten
require_once 'data.php';
//require 'data.php'; // Falls Datei nicht existiert dann wird eine Fehlermeldung ausgegeben (Full stopp)
//include 'data.php'; // Falls Datei nicht existiert dann wird eine Warnung ausgegeben (Arbeiten weiter)
//include_once 'data.php';

// 2. HAUPTSCHLEIFE
while (true) {

    // 3. HAUPTMENÜ ANZEIGEN (Jetzt in Blau und Fett)
    echo "=========================================\n";
    echo STYLE_BOLD . COLOR_BLUE . "📦 WARENWIRTSCHAFTS-TERMINAL 📦\n" . COLOR_RESET;
    echo "=========================================\n";
    echo "Bitte wähle eine Aktion:\n";
    echo "1. Einzelnes Produkt prüfen" . PHP_EOL;
    echo "2. Report: Niedriger Bestand\n";
    echo "3. Report: Produkte nach Kategorie\n";
    echo STYLE_BOLD . COLOR_YELLOW . "4. Programm beenden\n" . COLOR_RESET; // Beenden in Gelb
    echo "=========================================\n";
    echo "Deine Auswahl: ";

    // 4. AKTION AUSWÄHLEN
    //fgets(STDIN) - lesen aus Konsole User eingabe
    //trim - entfernt Leerzeichen am Anfang und Ende
    $aktion = trim(fgets(STDIN));
    echo "\n";

    // 5. LOGIK-VERZWEIGUNG

    // --- AKTION 1: Einzelnes Produkt prüfen ---
    if ($aktion == 1) {

        echo STYLE_BOLD . "--- Einzelproduktprüfung ---\n" . COLOR_RESET;

        $skuListe = array_keys($lagerbestand);

        foreach ($skuListe as $index => $sku) {
            $produktName = $lagerbestand[$sku]['name'];
            echo ($index + 1) . ". " . $produktName . "\n";
        }
        echo "----------------------------\n";
        echo "Deine Auswahl: ";

        $ausgewaehlteNummer = intval(trim(fgets(STDIN)));
        $arrayIndex = $ausgewaehlteNummer - 1;

        if (isset($skuListe[$arrayIndex])) {
            $sku = $skuListe[$arrayIndex];
            $produkt = $lagerbestand[$sku];

            echo "\n... prüfe Bestand für '" . STYLE_BOLD . $produkt['name'] . "' ...\n" . COLOR_RESET;

            // HIER KOMMEN DIE FARBEN INS SPIEL
            if ($produkt['anzahl'] == 0) {
                echo COLOR_RED . "[ALARM] ❌ Produkt ist AUSVERKAUFT!\n" . COLOR_RESET;
            } elseif ($produkt['anzahl'] < $produkt['warnschwelle']) {
                echo COLOR_YELLOW . "[WARNUNG] ⚠️ Produkt ist niedrig. Bestand: " . $produkt['anzahl'] . " Stk.\n" . COLOR_RESET;
            } else {
                echo COLOR_GREEN . "[OK] ✅ Produkt ist ausreichend vorhanden. Bestand: " . $produkt['anzahl'] . " Stk.\n" . COLOR_RESET;
            }

        } else {
            echo COLOR_RED . "[FEHLER] ❓ Ungültige Auswahl.\n" . COLOR_RESET;
        }

        // --- AKTION 2: Report: Niedriger Bestand ---
    }
    elseif ($aktion == 2) {

        echo STYLE_BOLD . "--- Report: Niedriger Bestand ---\n" . COLOR_RESET;
        $etwasGefunden = false;

        foreach ($lagerbestand as $details) {
            if ($details['anzahl'] < $details['warnschwelle']) {
                if ($details['anzahl'] == 0) {
                    echo COLOR_RED . "[ALARM] " . $details['name'] . " (Bestand: " . $details['anzahl'] . ")\n" . COLOR_RESET;
                } else {
                    echo COLOR_YELLOW . "[WARNUNG] " . $details['name'] . " (Bestand: " . $details['anzahl'] . " / Schwelle: " . $details['warnschwelle'] . ")\n" . COLOR_RESET;
                }
                $etwasGefunden = true;
            }
        }

        if ($etwasGefunden == false) {
            echo COLOR_GREEN . "Alle Bestände sind im grünen Bereich!\n" . COLOR_RESET;
        }

        // --- AKTION 3: Report: Nach Kategorie ---
    }
    elseif ($aktion == 3) {

        echo STYLE_BOLD . "--- Report: Produkte nach Kategorie ---\n" . COLOR_RESET;

        $alleKategorien = array_column($lagerbestand, 'kategorie');
        $einzigartigeKategorien = array_unique($alleKategorien);
        sort($einzigartigeKategorien);

        foreach ($einzigartigeKategorien as $kategorie) {
            echo "\n## KATEGORIE: " . STYLE_BOLD . COLOR_CYAN . $kategorie . COLOR_RESET . " ##\n";

            foreach ($lagerbestand as $details) {
                if ($details['kategorie'] == $kategorie) {
                    echo "  - " . $details['name'] . " (Bestand: " . $details['anzahl'] . " Stk.)\n";
                }
            }
        }

        // --- AKTION 4: Programm beenden ---
    }
    elseif ($aktion == 4) {

        echo STYLE_BOLD . COLOR_YELLOW . "Auf Wiedersehen!\n" . COLOR_RESET;
        break; // Beenden der 'while (true)'-Schleife
        //continue; Schleife wird zu nächste Item gesprungen/übersprungen

        // --- AKTION 5: Ungültige Eingabe ---
    }
    else {
        echo COLOR_RED . "[FEHLER] ❓ Aktion '" . $aktion . "' ist unbekannt. Bitte 1, 2, 3 oder 4 eingeben.\n" . COLOR_RESET;
    }

    // 6. PAUSE-MECHANISMUS
    if ($aktion != 4) {
        echo "\nDrücke Enter, um zum Hauptmenü zurückzukehren...";
        fgets(STDIN);
    }

} // Ende der 'while (true)'-Schleife

// 7. ABSCHLUSS
// Sicherstellen, dass der Cursor nach Beendigung wieder normale Farben hat
echo COLOR_RESET;
echo "=========================================\n";
