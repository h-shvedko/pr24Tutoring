<?php

class RegistrierungClass
{
    //Eigenschaften (Eng->parameters)
    public string $username = 'Test username default';
    public string $pass1;
    public string $pass2;


    //Methoden (methods)
    public function register(string $username, string $pass1, string $pass2): array
    {
        $dataFile = 'users.txt';
        $idDataFile = 'idData.txt';

        $errors = [];
        if (empty($username)) {
            $errors[] = "Benutzername darf nicht leer sein.";
        } elseif (strlen(trim($username)) < 5) {
            $errors[] = "Benutzername muss mindestens 5 Zeichen lang sein.";
        }

        if (empty($pass1)) {
            $errors[] = "Pasword darf nicht leer sein.";
        } elseif (strlen(trim($pass1)) < 8) {
            $errors[] = "Pasword muss mindestens 8 Zeichen lang sein.";
        }

        if (empty($pass2)) {
            $errors[] = "Passwort-Wiederholung darf nicht leer sein.";
        } elseif (strlen(trim($pass2)) < 8) {
            $errors[] = "Passwort-Wiederholung muss mindestens 8 Zeichen lang sein.";
        }

        if (!empty($pass1) && !empty($pass2) && $pass1 != $pass2) {
            $errors[] = "Die Passwörter stimmen nicht überein.";
        }

        if (empty($errors)) {
            $usersList = [];
            $users = file_get_contents($dataFile);
            if ($users !== false) {
                $usersList = explode("\n", $users);
            } else {
                file_put_contents($dataFile, "");
            }

            foreach ($usersList as $userString) {
                $userDataFromDB = explode("|||", $userString);
                if ($userDataFromDB[0] == $username) {
                    $errors[] = "Benutzername ist bereits vergeben.";
                }
            }

            if (empty($errors)) {
                $id = file_get_contents($idDataFile);
                $newId = intval($id) + 1; // $id +1 => '100'+1 => '1001' ||||| intval($id) +1 => 100 +1 = 101
                $hashedPassword = password_hash($pass1, PASSWORD_DEFAULT);
                $passwordToStore = $hashedPassword;
                $usernameToStore = $username;
                $date = date("Y-m-d H:i:s");
                $userRecord = $newId . '|||' . $usernameToStore . "|||" . $passwordToStore . "|||" . $date . "\n";

                file_put_contents($dataFile, $userRecord, FILE_APPEND | LOCK_EX);
                file_put_contents($idDataFile, $newId);
            }
        }
        return ['id' => $newId, 'errors' => $errors, 'date' => $date, 'profile' => ['username' => $username, 'password' => $passwordToStore]];
    }
}
