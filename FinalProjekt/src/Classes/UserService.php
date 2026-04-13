<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Classes/Database.php';


class UserService {
    public static function getNumberOfUsers() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT COUNT(*) AS count FROM users");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    }
}
?>