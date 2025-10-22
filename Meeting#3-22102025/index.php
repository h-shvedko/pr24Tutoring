<?php

//Indiziertes Array
$indiziertesIntegerArray = [0,1,2,3,4,5,6,7,8,9];
$indiziertesStringArray = ['John', 'Doe', 'Jane'];
$indiziertesFloatArray = [1.2, 1.3, 1.4, 1.5, 1.6, 1.7, 1.8, 1.9];
$indiziertesMixArray = [1, "John", 1.2, 4, "Doe"];

//echo $indiziertesIntegerArray[0] -> 0
//echo $indiziertesStringArray[2] -> Jane
//echo $indiziertesFloatArray[5] -> 1.7
//echo $indiziertesMixArray[1] -> John


//Associatives Array
$associativesIntArray = [
    4 => 1, // key => value (int => int)
    3 => 2,
    2 => 3,
    1 => 4,
    0 => 5,
];

/**
 * $blogPostId1 = 1 - $blogPostText1 = "text von post 1"
 * $blogPostId2 = 2 - $blogPostText2 = "text von post 2"
 * $blogPostId3 = 3 - $blogPostText3 = "text von post 3"
 * ...
 * $blogPostId100 = 100 - $blogPostText100 = "text von post 100"
 */

//$blogPosts = [
//    $blogPostId1 => $blogPostText1,
//    $blogPostId2 => $blogPostText2,
//    $blogPostId3 => $blogPostText3,
//    //...
//    $blogPostId100 => $blogPostText100,
//];
//
//ksort($blogPosts); // sortinrung nach key aufsteigend 1 => 100
//krsort($blogPosts); // sortierung nach key absteigend 100 => 1
//
//echo $associativesIntArray[1];

$associativesMixArray = [
    'John' => 22, // key => value (string => int)
    'Doe' => 66,
    'Jane' => 12
];

//echo $associativesMixArray['John'] !== echo $associativesMixArray[0]
//echo $associativesMixArray['John'] . PHP_EOL;
//var_dump($associativesMixArray);

//$associativesMixArrayToindiziertes = array_values($associativesMixArray); // ergibt ein indiziertes Array mit keys 0,1,2... aus gegebenen als parameter Array
//echo $associativesMixArrayToindiziertes[0] . PHP_EOL;
//var_dump($associativesMixArrayToindiziertes);

//Array in Array
$indiziertesArrayInArray = [
    [1,2,3],
    [4,5,6],
    ['John', 'Doe', 'Jane']
];

//var_dump($indiziertesArrayInArray);

//Multy dimentional Array
$associativesArrayInArray = [
    'John' => ['alt' => 22,'geschlaucht' => 'W','land' => 'Deutschland'],
    'Doe' => ['alt' => 66, 'geschlaucht' => 'M', 'land' => 'Schweiz'],
    'Jane' => ['alt' => 12, 'geschlaucht' => 'W', 'land' => 'Östereich'],
    'JaneString' => 'teststring'
];

//print_r($associativesArrayInArray['Doe']['land']);

foreach ($associativesArrayInArray as $keyStufe1 => $valueStufe1) {
    if (is_array($valueStufe1)) {
        echo $keyStufe1 . ' ';
        foreach ($valueStufe1 as $keyStufe2 => $valueStufe2) {
            echo $keyStufe2 . ' ' . $valueStufe2 . PHP_EOL;
        }
    } else {
        echo $keyStufe1 . ' ' . $valueStufe1 . PHP_EOL;
    }
}

/**
 * Aufgabe 1: Der "Array-Drucker" (Wiederholung foreach) Gegeben ist ein indiziertes Array mit Städtenamen:
 * $staedte = ["Berlin", "Hamburg", "München", "Köln", "Frankfurt"]; Schreibe ein PHP-Skript,
 * das dieses Array mit einer foreach-Schleife durchläuft und die Städte als Konsole Ouput ausgibt.
 *
 * Aufgabe 2: Der Profil-Ausgeber (Wiederholung Assoziative Arrays) Gegeben ist ein assoziatives Array,
 * das ein Buch beschreibt: $buch = ["titel" => "Der Herr der Ringe", "autor" => "J.R.R. Tolkien", "jahr" => 1954];
 * Schreibe ein PHP-Skript, das dieses Array mit foreach durchläuft und die Daten in einem schönen Format ausgibt.
 *
 * Bonus-Ziel: Gib es so aus: Titel: Der Herr der Ringe Autor: J.R.R. Tolkien Jahr: 1954
 * (Tipp: Du brauchst hier die Schleifen-Variante foreach ($buch as $key => $value))
 *
 * Aufgabe 3 (Bonus-Challenge): Der Noten-Rechner Gegeben ist ein assoziatives Array mit Fächern und Noten:
 * $noten = ["Mathe" => 2, "Deutsch" => 1, "Englisch" => 3, "Geschichte" => 2]; Schreibe ein PHP-Skript, das den Notendurchschnitt berechnet.
 * Du musst:
 * 1. Alle Noten (die Values) zusammenzählen (ähnlich wie bei Aufgabe 1).
 * 2. Die Anzahl der Fächer ermitteln (Tipp: die Funktion count($noten) hilft dir).
 * 3. Die Summe durch die Anzahl teilen und das Ergebnis ausgeben.
 */
