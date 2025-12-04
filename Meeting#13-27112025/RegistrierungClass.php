<?php

class RegistrierungClass
{
    //Eigenschaften (Eng->parameters)
    public string $username = 'Test username default';
    public string $pass1;
    public string $pass2;

    public string $dbFilename;
    public string $dbIdFilename;

    public function __construct(
        string $dbFilename, //users.txt
        string $dbIdFilename, // idData.txt
        string $username, // Test Eingabe
        string $pass1, //123123123
        string $pass2 //123123123
    )
    {
        $this->dbFilename = $dbFilename; //users.txt
        $this->dbIdFilename = $dbIdFilename; // idData.txt
        $this->username = $username; // Test Eingabe
        $this->pass1 = $pass1; //123123123
        $this->pass2 = $pass2; //123123123

        //users.txt
        if (!file_exists($this->dbFilename)) {
            file_put_contents($this->dbFilename, "");
        }

        //idData.txt
        if (!file_exists($this->dbIdFilename)) {
            file_put_contents($this->dbIdFilename, "0");
        }
    }

    //Methoden (methods)
    public function register(): array
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
                $userRecord = $newId . '|||' . $usernameToStore . "|||" . $passwordToStore . "|||" . $date . "\n";

                file_put_contents($this->dbFilename, $userRecord, FILE_APPEND | LOCK_EX);
                file_put_contents($this->dbIdFilename, $newId);
            }
        }
        return ['id' => $newId, 'errors' => $errors, 'date' => $date, 'profile' => ['username' => $this->username, 'password' => $passwordToStore]];
    }
}
