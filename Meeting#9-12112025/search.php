<?php

//Magische Variable / Global

echo "GET<br>";
echo "<pre>";
print_r($_GET);
echo "</pre>";


if(isset($_GET['email1'])){
    echo "Wilkommen User " . $_GET['email1'] . "<br>";
} else {
    echo "Wilkommen Unkown User" . "<br>";
}

$_GET['email1'] = 'unknown.user@gmail.com';

echo "Wilkommen User " . $_GET['email1'] . "<br>";

$_GET['email2'] = 'test@user.test.com';

echo "Wilkommen User " . $_GET['email2'] . "<br>";
