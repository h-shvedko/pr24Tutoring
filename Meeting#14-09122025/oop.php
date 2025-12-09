<?php

require_once 'RegistrierungClass.php';
require_once 'data.php';

$registrierung = new RegistrierungClass('Test Eingabe', '123123123', '123123123');
$registrierung->register();


$registrierung2 = new RegistrierungClass('Test Eingabe new', '1231231234', '1231231234');
$registrierung2->setDbFilename('users1.txt');
$registrierung2->setDbIdFilename('idData1.txt');
$registrierung2->register();



//Ergebnis kommt hier
