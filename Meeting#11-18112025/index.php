<?php

require_once "data.php";

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrierungs-Formular</title>
</head>
<body>

<h1>Neues Konto erstellen</h1>

<form action="registrierung.php" method="post" novalidate>

    <?php if (!empty($errors)): ?>
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            <strong>Bitte korrigiere die folgenden Fehler:</strong>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!empty($successMessage)): ?>
        <div style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 15px;">
            <?= $successMessage; ?>
        </div>
    <?php endif; ?>


    <div>
        <label for="name_feld">Benutzername (min. 5 Zeichen):</label><br>
        <input type="text" id="name_feld" name="username" value="<?= htmlspecialchars($username); ?>">
    </div>

    <br>

    <div>
        <label for="pass1_feld">Passwort (min. 8 Zeichen):</label><br>
        <input type="password" id="pass1_feld" name="pass1">
    </div>

    <br>

    <div>
        <label for="pass2_feld">Passwort wiederholen:</label><br>
        <input type="password" id="pass2_feld" name="pass2">
    </div>

    <br>

    <div>
        <button type="submit">Konto erstellen</button>
    </div>

</form>

</body>
</html>
