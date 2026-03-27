<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Classes/AuthService.php';

// session_start();

$authService = new AuthService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($authService->login($username, $password)) {
        header('Location: /dashboard');
        exit();
    }
}

require_once __DIR__ . '/../templates/header.php';
?>

<div class="container mt-5">
    <h1>Login</h1>

    <?php if (!empty($_SESSION['errors'])): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="row">

            <div class="col-12 col-md mb-3">
                <label>Benutzername:</label>
                <input class="form-control" type="text" name="username">
            </div>

            <div class="col-12 col-md mb-3">
                <label>Passwort:</label>
                <input class="form-control" type="password" name="password">
            </div>

            <div class="col-12 mt-3">
                <button class="btn btn-success" type="submit">Login</button>
            </div>

        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>