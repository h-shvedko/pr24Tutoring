<?php


function umsatzsteuer(float $summe, int $prozent = 19): float
{
    $ust = $summe * $prozent / 100;

    return $ust;
}

function summeInput(): array
{
    echo "Deine Summe: ";
    $summeInput = trim(fgets(STDIN));
    echo "\n";

    echo "Dein Prozent: ";
    $prozentInput = trim(fgets(STDIN));
    echo "\n";

    return [$summeInput, $prozentInput];
}

//[$summe, $prozent] = summeInput(); <=> $inputs = summeInput();

[$summe, $prozent] = summeInput(); // summeInput liefert jedes mal nur bestimmte nummer von werte und nie andere nummer von werte
//$inputs = summeInput(); // $inputs[0] $inputs[1] -> summeInput liefert jedes mal NICHT bestimmte nummer von werte (10,20,0,100,155 usw.)

$ustWert = umsatzsteuer($summe, $prozent);

echo "Dein UStWert: " . $ustWert . "\n";


[$summe] = summeInput();

$ustWert = umsatzsteuer($summe);
echo "Dein UStWert: " . $ustWert . "\n";



//HA: Berechne die Summe aller geraden Zahlen in einem Array

$inputArray = [1,2,3,4,5,6,7,8,9];
$summe = geradeZahlenSumme($inputArray);

echo "Summe von Geradezahlen: " . $summe . "\n";
function geradeZahlenSumme(array $inputArray): float
{
    //@TODO
}

