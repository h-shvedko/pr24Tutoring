# 📅 Development Plan: Terminbuchungssystem

**Konzept:**
Der Router in der `index.php` ist der Pförtner. Er sagt nur: "Du willst `/login`? Okay, ich lade die Datei `src/pages/login.php`."
In den Dateien nutzen wir deine **Klassen** (`AuthService`, `Database`), um die Arbeit zu erledigen.

---

## 📂 Die neue Ordnerstruktur

```text
mein-projekt/
├── docker-compose.yml
├── Dockerfile
├── composer.json
├── public/
│   ├── index.php         <-- Der Router (Eingangstür)
│   └── css/              <-- Bootstrap CSS (oder CDN)
└── src/
    ├── Classes/          <-- Deine OOP Logik (Database, User, Services)
    ├── templates/        <-- Bausteine (header.php, footer.php)
    └── pages/            <-- Die eigentlichen Seiten (PHP + HTML gemischt)
        ├── home.php
        ├── login.php
        ├── register.php
        └── dashboard.php

```

---

## 🏗️ Phase 1: Infrastruktur & Router

*Dauer: ca. 1-2 Stunden*

### 1.1 Docker & Composer

Das bleibt gleich (wie im vorherigen Chat besprochen).

* `docker-compose.yml` und `Dockerfile` erstellen.
* `composer require bramus/router`.

### 1.2 Der Router (`public/index.php`)

Hier ist der Unterschied: Wir rufen keine Controller-Klasse auf, sondern laden einfach die passende Datei.

```php
<?php
// public/index.php
require __DIR__ . '/../vendor/autoload.php';

$router = new \Bramus\Router\Router();

// ROUTEN DEFINIEREN:

// Startseite
$router->get('/', function() {
    require __DIR__ . '/../src/pages/home.php';
});

// Login (Zeigen)
$router->get('/login', function() {
    require __DIR__ . '/../src/pages/login.php';
});

// Login (Formular absenden)
$router->post('/login', function() {
    require __DIR__ . '/../src/pages/login.php'; // Die Logik ist in der gleichen Datei oben
});

// Dashboard
$router->get('/dashboard', function() {
    // Hier können wir sogar Session-Check machen
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit();
    }
    require __DIR__ . '/../src/pages/dashboard.php';
});

// Router starten
$router->run();

```

---

## 🔐 Phase 2: Die Klassen (Deine Logik-Bausteine)

*Dauer: ca. 3 Stunden*

Wir kapseln die komplizierte SQL-Logik in Klassen, damit die Seiten sauber bleiben. Das ist genau das, was wir in UE 17/18 geübt haben.

**Namespace:** `App\` (in `composer.json` einrichten für Ordner `src/Classes/`).

### 2.1 `src/Classes/Database.php`

* Statische Methode `connect()` (PDO Singleton).

### 2.2 `src/Classes/AuthService.php`

* Methode `login($username, $password)`: Prüft DB und setzt `$_SESSION`.
* Methode `register($username, $password)`: `INSERT INTO users ...`.
* Methode `logout()`: Session löschen.

### 2.3 `src/Classes/AppointmentService.php`

* Methode `getAllSlots()`: `SELECT * FROM appointments`.
* Methode `bookSlot($slotId, $userId)`: `UPDATE appointments ...`.

---

## 🎨 Phase 3: Templates (Header & Footer)

*Dauer: ca. 1 Stunde*

Damit wir nicht auf jeder Seite `<html><head>...` schreiben müssen.

* **`src/templates/header.php`**:
* Öffnet `<html>`, `<body>`.
* Lädt Bootstrap CSS.
* Enthält die **Navigation** (Navbar).
* *Logik:* `if(isset($_SESSION['user_id']))` -> Zeige "Logout", sonst "Login".




* **`src/templates/footer.php`**:
* Schließt `</body>`, `</html>`.
* Lädt Bootstrap JS.



---

## 🖥️ Phase 4: Die Seiten (PHP + HTML)

*Dauer: ca. 3-4 Stunden*

Hier wendest du dein Wissen an. Jede Datei sieht so aus:

1. **Oben:** PHP-Logik (Formular verarbeiten, Services aufrufen).
2. **Mitte:** `include header`.
3. **Unten:** HTML Ausgabe.

### 4.1 `src/pages/login.php` (Beispiel)

```php
<?php
use App\Classes\Database;
use App\Classes\AuthService;

$error = "";

// 1. FORMULAR LOGIK (Wie früher!)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = Database::connect();
    $auth = new AuthService($pdo);
    
    if ($auth->login($_POST['username'], $_POST['password'])) {
        header("Location: /dashboard");
        exit;
    } else {
        $error = "Falsche Daten!";
    }
}
?>

<?php include __DIR__ . '/../templates/header.php'; ?>

<div class="container mt-5">
    <h1>Login</h1>
    
    <?php if($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="/login">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Einloggen</button>
    </form>
</div>

<?php include __DIR__ . '/../templates/footer.php'; ?>

```

### 4.2 `src/pages/dashboard.php`

1. Session starten (wurde schon im Router gemacht, oder hier zur Sicherheit `session_start()` prüfen).
2. Daten laden:
* `$pdo = Database::connect();`
* `$service = new AppointmentService($pdo);`
* `$slots = $service->getAllSlots();`


3. Post-Logik (Buchen/Stornieren):
* `if ($_POST['action'] == 'book') { ... }`


4. HTML Tabelle mit Bootstrap anzeigen.
