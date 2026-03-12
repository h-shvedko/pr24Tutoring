<?php

class Database {
    private $host = 'termin_db';
    private $db_name = 'termin_db';
    private $username = 'user';
    private $password = 'password';
    private $conn;
    public static $instance = null;

    private function __construct() {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function getConnection() {
        return $this->conn;
    }
}