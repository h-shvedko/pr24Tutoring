<?php

require_once "data.php";
require_once "registrierung_logic.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = register($username, $pass1, $pass2);
    $result['id'] = 0;
    //$result['id']
    if(!empty($result['errors'])) {
        //errors bei der Registrierung zeigen
        foreach($result['errors'] as $error) {
            echo $error;
        }
    } else {
        $username = $result['profile']['user'];
        //redirect zu dashboard
    }
}
