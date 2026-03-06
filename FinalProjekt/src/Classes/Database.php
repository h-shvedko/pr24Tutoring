<?php

class Database {
    private $host = 'localhost';
    private $db_name = 'my_database';
    private $username = 'root';
    private $password = '';
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