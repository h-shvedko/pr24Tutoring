<?php


if(empty(trim($_GET['email1']))) {   // "  Test  " => trim("  Test  ") = "Test")
    echo "Bitte geben Sie eine Email ein!";
} else {
    echo "Du hast folgende Email gesucht: '" . trim($_GET['email1']) . "'";
}

if(isset($_GET['email1'])) {

}

require_once 'index.php';
