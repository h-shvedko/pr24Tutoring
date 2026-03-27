<?php
require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

// ROUTEN DEFINIEREN:

// Startseite
$router->get('/', function() {
    require __DIR__ . '/../src/pages/home.php';
});

// Login (Zeigen)
$router->get('/login', function() {
    session_start();
    if (isset($_SESSION['username'])) {
        header('Location: /dashboard');
        exit();
    }
    require __DIR__ . '/../src/pages/login.php';
});

// Login (Formular absenden)
$router->post('/login', function() {
    require __DIR__ . '/../src/pages/login.php';
});

$router->get('/register', function() {
    session_start();
    if (isset($_SESSION['username'])) {
        header('Location: /dashboard');
        exit();
    }
    require __DIR__ . '/../src/pages/register.php';
});

$router->post('/register', function() {
    require __DIR__ . '/../src/pages/register.php';
});

$router->get('/termine', function() {
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: /login');
        exit();
    }
    require __DIR__ . '/../src/pages/termine.php';
});

// Dashboard
$router->get('/dashboard', function() {
    // Hier können wir sogar Session-Check machen
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: /login');
        exit();
    }
    require __DIR__ . '/../src/pages/dashboard.php';
});

// Router starten
$router->run();
