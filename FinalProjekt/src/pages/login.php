<?php 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../Classes/AuthService.php';

$authService = new AuthService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['loginUsername'] ?? '';
    $password = $_POST['loginPassword'] ?? '';

    if ($authService->login($username, $password)) {
        header('Location: /dashboard');
        exit();
    }
}

?>

<h1>Login</h1>

<form action="login" method="post" novalidate>

    <?php if (!empty($_SESSION['errors'])): ?>
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            <strong>Bitte korrigiere die folgenden Fehler:</strong>
            <ul>
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div>
        <label for="name_feld">Benutzername:</label><br>
        <input type="text" id="name_feld" name="loginUsername" value="">
    </div>

    <br>

    <div>
        <label for="pass">Passwort:</label><br>
        <input type="password" id="pass" name="loginPassword">
    </div>

    <br>

    <div>
        <button type="submit">Login</button>
    </div>

<!-- 
  <div class="col-auto">
    <label for="staticEmail2" class="visually-hidden">Email</label>
    <input type="text"  id="staticEmail2" value="email@example.com">
  </div>
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Password</label>
    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
  </div> -->

</form>

<?php
require_once __DIR__ . '/../templates/footer.php';


