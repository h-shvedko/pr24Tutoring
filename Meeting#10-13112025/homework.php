<?php
// --- TEIL 1: DER PHP-TÜRSTEHER (Logik) ---

// Wir definieren unsere "Arbeits-Variablen" VORHER,
// damit sie im HTML-Teil immer existieren (für "Sticky Form").
$name = "";
$email = "";
$message = "";
$successMessage = ""; // Für die grüne Erfolgs-Box

// Das ist unser "Fehler-Korb". Wir sammeln hier alle Fehler.
$errors = [];

// Prüfen, ob das Formular überhaupt gesendet wurde (Logik aus UE 9)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Daten holen & säubern (trim)
    $name = trim($_POST['user_name']);
    $email = trim($_POST['user_email']);
    $message = trim($_POST['message']);

    // 2. VALIDIERUNGS-KETTE

    // Prüfung 1: Name leer? (Logik UE 9)
    if (empty($name)) {
        // Wir packen den Fehler in unseren Korb
        $errors[] = "Der Name darf nicht leer sein.";
    }

    // Prüfung 2: E-Mail leer? (Logik UE 9)
    if (empty($email)) {
        $errors[] = "Die E-Mail-Adresse darf nicht leer sein.";

        // Prüfung 3: E-Mail-Format gültig? (NEUE LOGIK UE 10)
        // Wir prüfen das Format nur, WENN das Feld nicht leer ist.
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Dies ist keine gültige E-Mail-Adresse.";
    }

    // 3. FINALE ENTSCHEIDUNG
    // Wir prüfen, ob unser Fehler-Korb leer ist.
    if (empty($errors)) {
        // ERFOLGSFALL
        $successMessage = "VIELEN DANK, " . htmlspecialchars($name) . "! Du nimmst am Wettbewerb teil.";

        // Formular-Felder "leeren", damit sie nach Erfolg nicht mehr kleben
        $name = "";
        $email = "";
    }
    // Wenn $errors NICHT leer ist, tun wir nichts.
    // Das Skript läuft einfach weiter und zeigt unten die Fehler an.
}

?>

<!-- --- TEIL 2: DIE WEBSEITE (HTML) --- -->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Wettbewerbs-Anmeldung</title>
</head>
<body>

<h1>Gewinne eine Reise!</h1>
<p>Trage dich jetzt ein, um teilzunehmen.</p>

<!--
    Das Formular:
    - action="contest.php" -> Sendet an sich selbst.
    - method="post"
-->
<form action="homework.php" method="post">

    <!--
        FEHLER-ANZEIGE:
        Wir prüfen, ob der Fehler-Korb ($errors) NICHT leer ist.
        Wenn ja, machen wir eine Schleife und geben JEDEN Fehler aus.
    -->
    <?php
    if (!empty($errors)): ?>
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            <strong>Bitte korrigiere die folgenden Fehler:</strong>
            <ul>
                <?php
                foreach ($errors as $error): ?>
                    <li><?= $error; ?></li> <!-- htmlspecialchars nicht nötig, da wir die Fehler selbst schreiben -->
                <?php
                endforeach; ?>
            </ul>
        </div>
    <?php
    endif; ?>

    <!--
        ERFOLGS-ANZEIGE:
        Wir prüfen, ob eine Erfolgs-Nachricht gesetzt wurde.
    -->
    <?php
    if (!empty($successMessage)): ?>
        <div style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 15px;">
            <?= $successMessage; ?>
        </div>
    <?php
    endif; ?>


    <div>
        <label for="name_feld">Dein Name:</label><br>
        <!--
            STICKY FORM:
            Wir füllen das 'value'-Attribut mit dem Wert, den der User
            bereits eingegeben hat.
            WICHTIG: htmlspecialchars() hier benutzen, falls der User
            < oder > in seinen Namen tippt!
        -->
        <input type="text" id="name_feld" name="user_name" value="<?= htmlspecialchars($name); ?>">
    </div>

    <br>

    <div>
        <label for="email_feld">Deine E-Mail:</label><br>
        <input type="text" id="email_feld" name="user_email" value="<?= htmlspecialchars($email); ?>">
    </div>
    <br>

    <div>
        <label for="email_feld">Dein Nachricht:</label><br>
        <textarea name="message"><?= htmlspecialchars($message); ?></textarea>
    </div>

    <br>

    <div>
        <button type="submit">Jetzt teilnehmen!</button>
    </div>

</form>

</body>
</html>


<?php

/**
 * Neue Validierungs-Regel:
 *
 * Die Nachricht (gast_nachricht) muss mindestens 10 Zeichen lang sein.
 *
 * Tipp: Die Funktion strlen($string) gibt dir die Anzahl der Zeichen als Zahl zurück (z.B. strlen("Hallo") ist 5).
 *
 */
