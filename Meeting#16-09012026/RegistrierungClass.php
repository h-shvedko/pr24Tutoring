<?php

require_once "Utils.php";

class RegistrierungClass
{

    //public - 1
    //protected
    //private - 2

    //Eigenschaften (Eng->parameters)
    private string $username = 'Test username default';
    private string $pass1;
    private string $pass2;

    //HA
    //$email -> constructor defeniert -> in parameters von Class gespeichert -> get und set methoden

    protected string $dbFilename = 'users.txt';
    protected string $dbIdFilename = 'idData.txt';

    public static string $dbType = 'mysql';
    const DB_TYPE = 'mysql';

    public function __construct(
        string $username, // Test Eingabe
        string $pass1, //123123123
        string $pass2 //123123123
    )
    {
        $this->username = $username; // Test Eingabe
        $this->pass1 = $pass1; //123123123
        $this->pass2 = $pass2; //123123123

        Utils::checkIfFileExists($this->dbFilename);
        Utils::checkIfFileExists($this->dbIdFilename);

        self::$dbType = 'mongoDB';
    }

    //Methoden (methods)
    public function register(): array
    {
        $errors = $this->validate();

        if (empty($errors)) {
            $usersList = [];
            $users = file_get_contents($this->dbFilename); //users.txt
            if ($users !== false) {
                $usersList = explode("\n", $users);
            } else {
                file_put_contents($this->dbFilename, "");
            }

            foreach ($usersList as $userString) {
                $userDataFromDB = explode("|||", $userString);
                if ($userDataFromDB[0] == $this->username) {
                    $errors[] = "Benutzername ist bereits vergeben.";
                }
            }

            if (empty($errors)) {
                $id = file_get_contents($this->dbIdFilename); //idData.txt
                $newId = intval($id) + 1; // $id +1 => '100'+1 => '1001' ||||| intval($id) +1 => 100 +1 = 101
                $hashedPassword = password_hash($this->pass1, PASSWORD_DEFAULT);
                $passwordToStore = $hashedPassword;
                $usernameToStore = $this->username;
                $date = date("Y-m-d H:i:s");
                $userRecord = Utils::getUserStringForDB($newId, $usernameToStore, $passwordToStore, $date);

                file_put_contents($this->dbFilename, $userRecord, FILE_APPEND | LOCK_EX);
                file_put_contents($this->dbIdFilename, $newId);
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

    public function getDbFilename(): string
    {
        return $this->dbFilename;
    }

    public function setDbFilename(string $dbFilename): void
    {
        Utils::checkIfFileExists($dbFilename);
        $this->dbFilename = $dbFilename;
    }

    public function getDbIdFilename(): string
    {
        return $this->dbIdFilename;
    }

    public function setDbIdFilename(string $dbIdFilename): void
    {
        Utils::checkIfFileExists($dbIdFilename);
        $this->dbIdFilename = $dbIdFilename;
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
