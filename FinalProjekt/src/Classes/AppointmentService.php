<?php
require_once __DIR__ . '/Database.php';

class AppointmentService
{

    public function checkDuplicateAppointment($date, $time) {

        $db = Database::getInstance()->getConnection();

        $sql = "SELECT COUNT(*) AS count FROM termine WHERE date = :date AND time = :time";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':date' => $date,
            ':time' => $time
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            $_SESSION['errors'] = ['Ein Termin für dieses Datum und diese Uhrzeit existiert bereits.'];
            return false;
        }
        return true;
    }

    public function createAppointment($title, $description, $date, $time, $location, $userId)
    {
        $db = Database::getInstance()->getConnection();

        if (!$this->checkDuplicateAppointment($date, $time)) {
            return false;
        }

        if (empty($title) || empty($date) || empty($time) || empty($userId)) {
        $_SESSION['errors'] = ['Bitte alle Pflichtfelder ausfüllen.'];
            return false;
        }

        $stmt = $db->prepare("
            INSERT INTO termine (title, description, date, time, location, created_by)
            VALUES (:title, :description, :date, :time, :location, :created_by)
        ");

        $success = $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':date' => $date,
            ':time' => $time,
            ':location' => $location,
            ':created_by' => $userId
        ]);

        if (!$success) {
            $_SESSION['errors'] = ['Termin konnte nicht gespeichert werden.'];
            return false;
        }

        $termineId = $db->lastInsertId();

        $stmt = $db->prepare("
            INSERT INTO users_to_termine (user_id, termine_id)
            VALUES (:user_id, :termine_id)
        ");

        $stmt->execute([
            ':user_id' => $userId,
            ':termine_id' => $termineId
        ]);

        return true;
    }

    public static function getNumberOfAppointments() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT COUNT(*) AS count FROM termine");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    }

    public static function getAllAppointments() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM termine");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public static function getAppointmentById($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM termine WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAppointmentBySearch($query) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM termine WHERE title LIKE :query OR description LIKE :query");
        $stmt->execute([':query' => "%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAppointmentsByUserId($userId) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT t.* FROM termine t
            JOIN users_to_termine ut ON t.id = ut.termine_id
            WHERE ut.user_id = :user_id
        ");
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAppointmentsByUserIdAndDateRange($userId, $startDate, $endDate) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT t.* FROM termine t
            JOIN users_to_termine ut ON t.id = ut.termine_id
            WHERE ut.user_id = :user_id
            AND t.date BETWEEN :start_date AND :end_date
        ");
        $stmt->execute([
            ':user_id' => $userId,
            ':start_date' => $startDate,
            ':end_date' => $endDate
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteAppointment($appointmentId) {
        if (empty($appointmentId)) {
            $_SESSION['errors'] = ['Ungültige Termin-ID.'];
            return false;
        }

        $db = Database::getInstance()->getConnection();

        // Zuerst die Verknüpfungen in users_to_termine löschen
        $stmt = $db->prepare("DELETE FROM users_to_termine WHERE termine_id = :termine_id");
        $stmt->execute([':termine_id' => $appointmentId]);

        // Dann den Termin selbst löschen
        $stmt = $db->prepare("DELETE FROM termine WHERE id = :id");
        $success = $stmt->execute([':id' => $appointmentId]);

        if (!$success) {
            $_SESSION['errors'] = ['Termin konnte nicht gelöscht werden.'];
            return false;
        }

        return true;
    }

    public function editAppointment($appointmentId, $title, $description, $date, $time, $location) {

        if (!$this->checkDuplicateAppointment($date, $time)) {    
        return false;
        }
        if (empty($appointmentId) || empty($title) || empty($date) || empty($time)) {
            $_SESSION['errors'] = ['Bitte alle Pflichtfelder ausfüllen.'];
            return false;
        }

        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("
            UPDATE termine
            SET title = :title, description = :description, date = :date, time = :time, location = :location
            WHERE id = :id
        ");

        $success = $stmt->execute([
            ':id' => $appointmentId,
            ':title' => $title,
            ':description' => $description,
            ':date' => $date,
            ':time' => $time,
            ':location' => $location
        ]);

        if (!$success) {
            $_SESSION['errors'] = ['Termin konnte nicht aktualisiert werden.'];
            return false;
        }

        return true;
    }
}