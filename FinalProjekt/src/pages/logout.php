<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Classes/AuthService.php';
AuthService::logout();
header('Location: /login');