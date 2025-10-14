<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Kontaktformular</title>
    <style>
body { font-family: sans-serif; }
        .error { color: red; }
    </style>
</head>
<body>

    <h2>Kontaktieren Sie uns</h2>

    <form action="aufgabe2.php" method="post">
        <div>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name">
        </div>
        <br>
        <div>
            <label for="email">E-Mail:</label><br>
            <input type="email" id="email" name="email">
        </div>
        <br>
        <div>
            <label for="nachricht">Nachricht:</label><br>
            <textarea id="nachricht" name="nachricht" rows="5"></textarea>
        </div>
        <br>
        <div>
            <button type="submit">Senden</button>
        </div>
    </form>

</body>
</html>
