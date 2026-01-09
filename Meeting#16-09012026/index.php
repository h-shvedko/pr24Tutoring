<?php

require_once "RegistrierungClass.php";

$regestrierung = new RegistrierungClass("testUser", "password", "password");
$regestrierung->register();

//$newId = 1;
//$usernameToStore = 'TestStatic';
//$passwordToStore = "TestPasswordStatic";
//$date = date('Y-m-d H:i:s');
//
//$dbString = RegistrierungClass::getUserStringForDB($newId, $usernameToStore, $passwordToStore, $date);
//echo $dbString;

//echo RegistrierungClass::$dbType . "\n";
//echo RegistrierungClass::DB_TYPE . "\n";

//$regestrierung = new RegistrierungClass("testUser", "password", "password");
//
//
//echo RegistrierungClass::$dbType . "\n";
