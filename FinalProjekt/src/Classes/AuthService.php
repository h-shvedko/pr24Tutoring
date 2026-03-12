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

    public function register($username, $password) {
        $userFound = false;
        $usersDBData = file_get_contents($dataFile);
        $usersData = explode("\n", $usersDBData);

        if($usersDBData !== false) {
            foreach($usersData as $userString) {
                $user = explode("|||", $userString);
                $username = $user[0];
                $password = $user[1];
        }

        if($loginUsername == $username && password_verify($loginPassword, $password)) {
            $_SESSION['username'] = $username;
            $userFound = true;
        }   
            }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(empty($loginUsername)) {
                $_SESSION['errors'][] = "Benutzername darf nicht leer sein.";
            }

            if(empty($loginPassword)) {
                $_SESSION['errors'][] = "Password darf nicht leer sein.";
            }

            if($loginUsername == $username && password_verify($loginPassword, $password)) {
                $_SESSION['username'] = $username;
                $userFound = true;
            }
        }
        if(empty($errors) && $userFound) {
            require_once "../dashboard.php";
            exit;
        }

         if($userFound) {
            $_SESSION['errors'][] = "Benutzername ist bereits vergeben.";
            return false;
        }
    }

    public function logout() {
        session_start();

        session_destroy();

        header("Location: index.php");

    }
    
}