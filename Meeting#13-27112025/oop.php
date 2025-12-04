<?php

require_once 'RegistrierungClass.php';
require_once 'data.php';

$registrierung = new RegistrierungClass($dataFile, $idDataFile, 'Test Eingabe', '123123123', '123123123');
$registrierung->register();


$registrierung2 = new RegistrierungClass('users_new.txt', 'idData_new.txt', 'Test Eingabe new', '1231231234', '1231231234');
$registrierung2->register();



//Ergebnis kommt hier
