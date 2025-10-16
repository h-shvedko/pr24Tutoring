<?php

//Nützliche Funktionen
$testString = 'Test string'; //string
$testInteger = 123456789; //int
$testFloat = 123.55; //float
$testBoolean = true; //bool
$testNull = null; //null

$testArray = [1, 2, 3, 4, 5]; //array
$testObject = new stdClass(); //object

//mixed

//var_dump
//var_dump($testObject); //nutzt man für Variablen Inhalt und Eigenschaften zu sehen

//print_r
//print_r($testString); //Zeigt Inhalt sofort (console oder Website)
//$printRAusgabe = print_r($testArray, true); //Liefert die Ausgabe als return Wert und wir speichern die Ausgabe in Variablen

//echo
//echo $testString . PHP_EOL; // "\n" - Zeilenumbruch für die Konsole; "<br>" - Zeilenumbruch für HTML; EOL = end of line
//echo $testInteger . PHP_EOL;

//Datentypen von Variablen
$typeVariable = gettype($testObject); //gibt den Datentyp der Variable zurück

/**
 * is_array
 * is_bool
 * is_callable
 * is_countable // count()
 * is_double
 * is_float
 * is_int
 * is_integer
 * is_iterable
 * is_long
 * is_null
 * is_numeric
 * is_object
 * is_real
 * is_resource
 * is_scalar
 * is_string
 */

//Schleifen / loops

//echo count($testArray) . PHP_EOL;
//for ($i = 0; $i < count($testArray); $i++) {
//    if($i % 2 != 0) {
//        echo $i . " position mit Wert " . $testArray[$i] . PHP_EOL;
//    }
//}

//foreach ($testArray as $key => $value) {
//    if ($key % 2 == 0) {
//        echo $key . " position mit Wert " . $value . PHP_EOL;
//    }
//}

//$j = 0;
//while ($j < count($testArray)) {
//    echo $j . " position mit Wert " . $testArray[$j] . PHP_EOL;
//    $j++;
//}
//
//$j = 0;
//do {
//    echo $j . " position mit Wert " . $testArray[$j] . PHP_EOL;
//    $j++;
//} while ($j < count($testArray));

//if/else/elseif

//if(is_float($testFloat) && (!is_null($testFloat) || is_string($testFloat))) {
//    echo "Variable ist Float und NICHT NULL";
//} elseif(is_int($testFloat)) {
//    echo "Variable ist Integer";
//} elseif (is_null($testFloat)) {
//    echo "Variable ist NULL";
//} else {
//    echo "Variable ist kein Integer oder Float oder NULL";
//}

//if(is_float($testFloat) && (!is_null($testFloat) || is_string($testFloat))) {
//    echo "Variable ist Float und NICHT NULL" . PHP_EOL;
//}
//
//if(is_float($testFloat)) {
//    echo "Variable ist Integer" . PHP_EOL;
//}
//
//if (is_null($testFloat)) {
//    echo "Variable ist NULL" . PHP_EOL;
//} else {
//    echo "Variable ist kein Integer oder Float oder NULL" . PHP_EOL;
//}
