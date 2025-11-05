<?php

//https://www.php.net/manual/en/function.date.php
//https://www.php.net/manual/en/datetime.format.php - format
//$dateTime = date('d M y h-i-s');
////Americans - mm/dd/YYYY
////Europa - dd/mm/YYYY
//// 05-11-2025
//// 05.11.2025
//// 05 Nov 2025
//// 5 Nov 2025
//// 5 November 2025
//// 05 November 2025
//
//print_r($dateTime);

//$stringBeispiel = "lorem ipsum Test String";
//
//$grossgeschrieben = strtoupper($stringBeispiel);
//$kleingeschrieben = strtolower($stringBeispiel);
//$erstebuschtabegrossschrieben = ucfirst($stringBeispiel);
//
//echo $grossgeschrieben . PHP_EOL;
//echo $kleingeschrieben . PHP_EOL;
//echo $erstebuschtabegrossschrieben . PHP_EOL;
//
//if(str_contains($stringBeispiel, '@')) {
//    echo "String hat @ als substring";
//}

//$arrMitBustaben = ['a', 'b', 'c', 'd', 'e', 'f'];
//$strOuput = implode('-', $arrMitBustaben);
////print_r($strOuput);
//
//
//$strEingabe = 'John||Smith||Karl||Jannet';
//$arrErgebnis = explode('||', $strEingabe);
//
//print_r($arrErgebnis);
//CSV Files - Henndii,Shvedko,Deutschland,PHP




//https://www.php.net/manual/de/ref.array.php
//$arrMitBustaben = ['a', 'b', 'c', 'd', 'e', 'f'];
//$nummer = count($arrMitBustaben);
//
//echo $nummer;

//$arrMitBustaben = ['a', 'b', 'c', 'd', 'e', 'f'];
//$arrMitBustaben = 'stringtest';
//print_r($arrMitBustaben);
//if(in_array('a', $arrMitBustaben)) {
//    echo "A ist in unserem String";
//} else {
//    echo "A ist NICHT in unserem String";
//}

//if(is_array($arrMitBustaben)) {
//    array_push($arrMitBustaben, 'g', 'h', 'i', 'j', 'k', 'l', 'm');
//    print_r($arrMitBustaben);
//
//    $arrMitBustaben[] = 'n';
//    $arrMitBustaben[] = 'o';
//    $arrMitBustaben[] = 'p';
//
//    print_r($arrMitBustaben);
//} else {
//    echo "Wir duerfen nicht array_push nutzen, denn die Variable ein String ist";
//}
$arrMitBustaben = [
    'one' => 1, // $key => $value
    'two' => 2,
    'three' => 3,
];
print_r($arrMitBustaben);


$werte = array_values($arrMitBustaben);

print_r($werte);

$keys = array_keys($arrMitBustaben);

print_r($keys);




/**
 * Hausaufgabe:
 *
 *
 *
 * Aufgabe 1: Der Einkaufslisten-Manager
 *
 * Gegeben: $einkaufsliste = ["Milch", "Zucker", "Brot", "Eier"];
 *
 * Tasks:
 *
 * Füge die Produkte "Butter" und "Mehl" am Ende der Liste hinzu (array_push).
 *
 *
 * Gib die Liste auf der Konsole aus, aber nicht als Array, sondern als einzelnen String, bei dem
 * jedes Produkt mit ", " getrennt ist. (z.B. "Brot, Butter, Eier...") (implode).
 *
 *
 *
 *
 *
 * Aufgabe 2: Der User-Profil-Analyst
 *
 * Gegeben: $user = ["name" => "Max Mustermann", "alter" => 28, "stadt" => "Berlin", "beruf" => "Entwickler"];
 *
 * Tasks:
 *
 * Hole alle Schlüssel (Keys) aus dem Array. Gib sie als kommagetrennten String aus. (Erwartet: "name, alter, stadt, beruf")
 * (array_keys, implode).
 *
 * Hole alle Werte (Values) aus dem Array. Gib sie als kommagetrennten String aus.
 * (Erwartet: "Max Mustermann, 28, Berlin, Entwickler") (array_values, implode).
 *
 *
 */
