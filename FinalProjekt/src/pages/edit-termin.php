<?php

if (!isset($_SESSION['username'])) {
    header('Location: /login');
    exit();
}

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Classes/AppointmentService.php';

$appointmentService = new AppointmentService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($appointmentService->editAppointment(
        $_POST['id'] ?? null,
        $_POST['title'] ?? null,
        $_POST['description'] ?? null,
        $_POST['date'] ?? null,
        $_POST['time'] ?? null,
        $_POST['location'] ?? null
    )) {
        header('Location: /dashboard');
        exit();
    }
} 
    $appointmentId = $_GET['id'] ?? null;
    if (!$appointmentId) {
        header('Location: /dashboard');
        exit();
    }

    $appointment = AppointmentService::getAppointmentById($appointmentId);
    if (!$appointment) {
        header('Location: /dashboard');
        exit();
    }

    require_once __DIR__ . '/../templates/header.php';
    ?>

    <h1>Termin bearbeiten</h1>

    <?php if (!empty($_SESSION['errors'])): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($appointment['id']) ?>">
        <div>
            <label class="form-label" for="title">Titel:</label><br>
            <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars($appointment['title']) ?>" required>
        </div>

        <br>

        <div>
            <label class="form-label" for="description">Beschreibung:</label><br>
            <textarea id="description" name="description" class="form-control"><?= htmlspecialchars($appointment['description']) ?></textarea>
        </div>

        <br>

        <div>
            <label class="form-label" for="date">Datum:</label><br>
            <input type="date" id="date" name="date" class="form-control" value="<?= htmlspecialchars($appointment['date']) ?>" required>
        </div>

        <br>

        <div>
            <label class="form-label" for="time">Uhrzeit:</label><br>
            <input type="time" id="time" name="time" class="form-control" value="<?= htmlspecialchars($appointment['time']) ?>" required>
        </div>

        <br>

        <div>
            <label class="form-label" for="location">Ort:</label><br>
            <input type="text" id="location" name="location" class="form-control" value="<?= htmlspecialchars($appointment['location']) ?>">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">Speichern</button>
        <a href="/dashboard" class="btn btn-secondary">Abbrechen</a>
    </form>

    <?php
    require_once __DIR__ . '/../templates/footer.php';
