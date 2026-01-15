<?php

require_once "Utils.php";
require_once "Database.php";

class RegistrierungClass
{

    //public - 1
    //protected
    //private - 2

    //Eigenschaften (Eng->parameters)
    private string $username = 'Test username default';
    private string $pass1;
    private string $pass2;

    protected bool $isVIP = false;

    //HA
    //$email -> constructor defeniert -> in parameters von Class gespeichert -> get und set methoden

    private PDO $pdo;

    public function __construct(
        string $username, // Test Eingabe
        string $pass1, //123123123
        string $pass2 //123123123
    )
    {
        $this->username = $username; // Test Eingabe
        $this->pass1 = $pass1; //123123123
        $this->pass2 = $pass2; //123123123

        $this->pdo = Database::connect();
    }

    //Methoden (methods)
    public function register(): array
    {
        $errors = $this->validate();

        $newId = 0;
        $date = date('Y-m-d H:i:s');
        $passwordToStore = '';

        if (empty($errors)) {
            // :username ist ein Platzhalter (Sicherheit vor SQL-Injection!)
            // Username Formular [     ' OR '1'='1         ] =>
            // "SELECT COUNT(*) FROM users WHERE username = " . $this->username  =>
            // SELECT COUNT(*) FROM users WHERE username = '' OR '1'='1' => true
            // nach dem prepare -> ' OR '1'='1 -> "' OR '1'='1" => SELECT COUNT(*) FROM users WHERE username = "' OR '1'='1"


            // Username Formular [     ' ; DROP TABLE users; --         ] =>
            // "SELECT COUNT(*) FROM users WHERE username = " . $this->username  =>
            // SELECT COUNT(*) FROM users WHERE username = '' ; DROP TABLE users; --
            // nach dem prepare -> ' OR '1'='1 -> "' ; DROP TABLE users; --" => SELECT COUNT(*) FROM users WHERE username = "' ; DROP TABLE users; --"

            $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
            $stmt->execute(['username' => $this->username]);

            // fetchColumn() holt das Ergebnis von COUNT(*)
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                $errors[] = "Benutzername ist bereits vergeben.";
            }

            if (empty($errors)) {
                $passwordToStore = password_hash($this->pass1, PASSWORD_DEFAULT);

                if($this->isVIP) {
                    $sql = "INSERT INTO users (username, password, vip) VALUES (:username, :password, :vip)";
                } else {
                    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                }
                $stmt = $this->pdo->prepare($sql);

                try {
                    if ($this->isVIP) {
                        $stmt->execute([
                            'username' => $this->username,
                            'password' => $passwordToStore,
                            'vip' => 1
                        ]);
                    } else {
                        $stmt->execute([
                            'username' => $this->username,
                            'password' => $passwordToStore
                        ]);
                    }

                    // Wir können sogar die ID abfragen, die die DB generiert hat!
                    $newId = $this->pdo->lastInsertId();
                } catch (\PDOException $e) {
                    // Falls doch was schiefgeht (z.B. Datenbank weg)
                    $errors[] = "Datenbank-Fehler: " . $e->getMessage();
                }
            }
        }
        return ['id' => $newId, 'errors' => $errors, 'date' => $date, 'profile' => ['username' => $this->username, 'password' => $passwordToStore]];
    }

    public function validate(): array
    {
        $errors = [];
        if (empty($this->username)) {
            $errors[] = "Benutzername darf nicht leer sein.";
        } elseif (strlen(trim($this->username)) < 5) {
            $errors[] = "Benutzername muss mindestens 5 Zeichen lang sein.";
        }

        if (empty($this->pass1)) {
            $errors[] = "Password darf nicht leer sein.";
        } elseif (strlen(trim($this->pass1)) < 8) {
            $errors[] = "Password muss mindestens 8 Zeichen lang sein.";
        }

        if (empty($this->pass2)) {
            $errors[] = "Passwort-Wiederholung darf nicht leer sein.";
        } elseif (strlen(trim($this->pass2)) < 8) {
            $errors[] = "Passwort-Wiederholung muss mindestens 8 Zeichen lang sein.";
        }

        if (!empty($this->pass1) && !empty($this->pass2) && $this->pass1 != $this->pass2) {
            $errors[] = "Die Passwörter stimmen nicht überein.";
        }

        return $errors;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPass1(): string
    {
        return $this->pass1;
    }

    public function getPass2(): string
    {
        return $this->pass2;
    }
}
