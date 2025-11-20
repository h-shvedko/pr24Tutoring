<?php

require_once "data.php";

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login-Formular</title>
</head>
<body>

<h1>Login</h1>

<form action="login_check.php" method="post" novalidate>

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

</form>

</body>
</html>
