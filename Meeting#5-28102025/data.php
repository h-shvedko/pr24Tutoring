<?php
// config.php
// Diese Datei enthält alle Konfigurationen, Daten und Farbdefinitionen.

// --- 1. FARBDEFINITIONEN (ANSI ESCAPE CODES) ---
// \033[ ist der Startbefehl für einen Code.
// 'm' ist der Befehl zum Setzen der Farbe.
// '0m' ist der wichtigste Code: Er setzt alles zurück (Farbe, Fett, etc.)

define('COLOR_RESET', "\033[0m");
define('COLOR_RED', "\033[31m");
define('COLOR_GREEN', "\033[32m");
define('COLOR_YELLOW', "\033[33m");
define('COLOR_BLUE', "\033[34m");
define('COLOR_CYAN', "\033[36m"); // Türkis
define('STYLE_BOLD', "\033[1m"); // Fettschrift

// --- 2. DATENBANK (Wie bisher) ---

//$array = array_keys($lagerbestand)
// $array = ['APF-01', 'BAN-02', 'MIL-03', 'BRO-04', 'EIE-05', 'KAF-06'];

$lagerbestand = [
    'APF-01' => [
        "name" => "Äpfel (Bio)",
        "anzahl" => 80,
        "kategorie" => "Obst & Gemüse",
        "warnschwelle" => 20
    ],
    'BAN-02' => [
        "name" => "Bananen (Fairtrade)",
        "anzahl" => 45,
        "kategorie" => "Obst & Gemüse",
        "warnschwelle" => 20
    ],
    'MIL-03' => [
        "name" => "Milch (1.5%)",
        "anzahl" => 9,
        "kategorie" => "Milchprodukte",
        "warnschwelle" => 10
    ],
    'BRO-04' => [
        "name" => "Brot (Vollkorn)",
        "anzahl" => 0,
        "kategorie" => "Backwaren",
        "warnschwelle" => 5
    ],
    'EIE-05' => [
        "name" => "Eier (Freiland)",
        "anzahl" => 12,
        "kategorie" => "Milchprodukte",
        "warnschwelle" => 15
    ],
    'KAF-06' => [
        "name" => "Kaffee (Bohnen)",
        "anzahl" => 22,
        "kategorie" => "Getränke",
        "warnschwelle" => 10
    ]
];
