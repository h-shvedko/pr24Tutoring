<?php

// BaseClass <= RegistrierungClass <= VipRegistrierungClass <= NotVipRegistierungClass
class VipRegistrierungClass extends RegistrierungClass
{
    protected string $dbFilename = 'vipUsers.txt';

    protected string $dbIdFilename = 'vipIdData.txt';

    private string $dbPassword = 'vipPass123';

    protected function getUserStringForDB($newId, $usernameToStore, $passwordToStore, $date): string
    {
        return $newId . '|||' . $usernameToStore . "|||" . $passwordToStore . "|||VIP|||" . $date . "\n";
    }
}
