<?php

require_once 'RegistrierungClass.php';
require_once 'VipRegistrierungClass.php';

$registerClass = new RegistrierungClass('TestUserName3', 'TestPassword2', 'TestPassword2');
$result = $registerClass->register();

echo "<pre>";
print_r($result);
echo "</pre>";

$registerVIPClass = new VipRegistrierungClass('TestUserNameVIP', 'TestPassword2', 'TestPassword2');
$resultVIP = $registerVIPClass->register();

echo "<pre>";
print_r($resultVIP);
echo "</pre>";
