<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Classes/AuthService.php';

$authService = new AuthService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($authService->register($username, $email, $password)) {
        header('Location: /dashboard');
        exit();
    }
}

require_once __DIR__ . '/../templates/header.php';
?>

<h1>Willkommen auf der Registrierungsseite!</h1>

<?php if (!empty($_SESSION['errors'])): ?>
    <div class="alert alert-danger w-25">
        <ul>
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>


<form method="post">
  <div class="row">
    <div class="col-12 col-md">
      <label>Username:</label>
    <input class="form-control" type="text" name="username">
    </div>
    <div class="col-12 col-md">
      <label>Email:</label>
      <input class="form-control" type="text" name="email">
    </div>
    <div class="col-12 col-md">
      <label>Passwort:</label>
      <input class="form-control" type="password" name="password">
    </div>
    <div class="col-12 mt-3">
        <button class="btn btn-success" type="submit">Registrieren</button>
    </div>
  </div>
</form>

<?php require_once __DIR__ . '/../templates/footer.php'; ?>