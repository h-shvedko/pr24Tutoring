<?php
require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

// ROUTEN DEFINIEREN:

session_start();
$_SESSION['page'] = '';

// Startseite
$router->get('/', function() {
    $_SESSION['page'] = 'home';
    require __DIR__ . '/../src/pages/home.php';
});

// Login (Zeigen)
$router->get('/login', function() {
    $_SESSION['page'] = 'login';
    if (isset($_SESSION['username'])) {
        header('Location: /dashboard');
        exit();
    }
    require __DIR__ . '/../src/pages/login.php';
});

// Login (Formular absenden)
$router->post('/login', function() {
    $_SESSION['page'] = 'login';
     if (isset($_SESSION['username'])) {
        header('Location: /dashboard');
        exit();
    }
    require __DIR__ . '/../src/pages/login.php';
});

$router->get('/register', function() {
    $_SESSION['page'] = 'register';
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
    $_SESSION['page'] = 'termine';
    if (!isset($_SESSION['username'])) {
        header('Location: /login');
        exit();
    }
    require __DIR__ . '/../src/pages/termine.php';
});

$router->post('/termine', function() {
    $_SESSION['page'] = 'termine';
    if (!isset($_SESSION['username'])) {
        header('Location: /login');
        exit();
    }
    require __DIR__ . '/../src/pages/termine.php';
});

// Dashboard
$router->get('/dashboard', function() {
    // Hier können wir sogar Session-Check machen
    $_SESSION['page'] = 'dashboard';
    if (!isset($_SESSION['username'])) {
        header('Location: /login');
        exit();
    }
    require __DIR__ . '/../src/pages/dashboard.php';
});
$router->get('/logout', function() {
    require __DIR__ . '/../src/pages/logout.php';
});

$router->get('/delete-termin/(\d+)', function($id) {

    $_SESSION['page'] = 'delete-termin';
    if (!isset($_SESSION['username'])) {
        header('Location: /login');
        exit();
    }
    $_GET['id'] = $id; 
    require __DIR__ . '/../src/pages/delete-termin.php';
});

$router->get('/edit-termin/(\d+)', function($id) {
    $_SESSION['page'] = 'edit-termin';
    if (!isset($_SESSION['username'])) {
        header('Location: /login');
        exit();
    }

    $_GET['id'] = $id;
    require __DIR__ . '/../src/pages/edit-termin.php';
});

$router->post('/edit-termin/(\d+)', function($id) {
    $_SESSION['page'] = 'edit-termin';
    if (!isset($_SESSION['username'])) {
        header('Location: /login');
        exit();
    }

    $_GET['id'] = $id; 
    require __DIR__ . '/../src/pages/edit-termin.php';
});

$router->get('/search', function() {
    $_SESSION['page'] = 'search';
    if (!isset($_SESSION['username'])) {
        header('Location: /login');
        exit();
    }
    require __DIR__ . '/../src/pages/search.php';
});
// Router starten
$router->run();
