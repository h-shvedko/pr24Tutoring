<?php

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    require_once 'index.php';
    die;
}

$email = trim($_POST['email2']);
$password = htmlspecialchars(trim($_POST['password2']));

//XSS Injection
//<script>alert('Du wurdest gehackt!');</script>
//htmlspecialchars('<script>alert("Du wurdest gehackt!");</script>') => &lt;script&gt;alert(&quot;Du wurdest gehackt!&quot;);&lt;/script&gt;

if(empty($email)) {
    echo "Bitte geben Sie eine Email ein!";
    require_once 'index.php';
    die;
}

if(empty($password)) {
    echo "Bitte geben Sie ein Passwort ein!";
    require_once 'index.php';
    die;
}

if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo "Bitte geben Sie eine Email in richtige Format ein!";
    require_once 'index.php';
    die;
}

//SQL Injection
// INSERT INTO users (email, password) VALUES ('', 'test')
// INSERT INTO users (; DROP TABLE users;, password) VALUES ('', 'test')
//Kann man vermeiden nur mit PDO oder mysqli functions

?>

<h1>Willkommen user <?=$email?></h1>
<h2>Willkommen user <?=$password?></h2>
