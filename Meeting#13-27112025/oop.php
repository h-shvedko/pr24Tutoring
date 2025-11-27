<?php

require_once 'RegistrierungClass.php';

$registrierung = new RegistrierungClass();
$registrierung->username = 'Test Eingabe';
$registrierung->pass1 = '123123123';
$registrierung->pass2 = '123123123';

$registrierung->register();

//Ergebnis kommt hier
