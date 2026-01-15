<?php

class Utils
{
    public static function getUserStringForDB($newId, $usernameToStore, $passwordToStore, $date): string
    {
        return $newId . '|||' . $usernameToStore . "|||" . $passwordToStore . "|||" . $date . "\n";
    }

    public static function checkIfFileExists(string $fileName): void
    {
        if(!empty($fileName)) {
            if (!file_exists($fileName)) {
                file_put_contents($fileName, "");
            }
        }
    }
}
