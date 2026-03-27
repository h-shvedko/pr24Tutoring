<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Classes/Database.php';

class AuthService {
    public function login($username, $password) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");    
        
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user === false || empty($user)) {
            $_SESSION['errors'] = ['Ungültiger Benutzername oder Passwort.'];
            return false; 
        }

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            return true; 
        } else {
            $_SESSION['errors'] = ['Ungültiger Benutzername oder Passwort.'];
            return false; 
        }
    }
    public function register($username, $email, $password) {

        //  Benutzername prüfen
        if (empty($username)) {
            $_SESSION['errors'] = ['Benutzername darf nicht leer sein.'];
            return false;
        }

        if (strlen(trim($username)) < 4) {
            $_SESSION['errors'] = ['Benutzername muss mindestens 4 Zeichen lang sein.'];
            return false;
        }

        //   Passwort prüfen
        if (empty($password)) {
            $_SESSION['errors'] = ['Passwort darf nicht leer sein.'];
            return false;
        }

        if (strlen(trim($password)) < 6) {
            $_SESSION['errors'] = ['Passwort muss mindestens 6 Zeichen lang sein.'];
            return false;
        }

        //   E-Mail prüfen
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $_SESSION['errors'] = ['Bitte verwenden Sie eine gültige E-Mail-Adresse.'];
            return false;
        }

        $db = Database::getInstance()->getConnection();

        //   Prüfen ob Benutzer existiert
        $stmt = $db->prepare(
            "SELECT id FROM users WHERE username = :username OR email = :email"
        );

        $stmt->execute([
            ':username' => $username,
            ':email' => $email
        ]);

        if ($stmt->fetch()) {
            $_SESSION['errors'] = ['Benutzername oder Email bereits vergeben.'];
            return false;
        }

        //   Passwort hashen
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //   Benutzer speichern
        $stmt = $db->prepare("
            INSERT INTO users (username, email, password)
            VALUES (:username, :email, :password)
        ");

        $success = $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);

        if ($success) {
            $_SESSION['username'] = $username;
            return true;
        }

        $_SESSION['errors'] = ['Registrierung fehlgeschlagen.'];
        return false;
    }

    public function logout() {
        session_start();

        session_destroy();

        header("Location: index.php");

    }  
}
