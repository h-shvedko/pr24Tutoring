<?php

if (!isset($_SESSION['username'])) {
    header('Location: /login');
    exit();
}

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Classes/AppointmentService.php';

$appointmentService = new AppointmentService();

$query = $_GET['query'] ?? '';
$appointments = AppointmentService::getAppointmentBySearch($query);

require_once __DIR__ . '/../templates/header.php';
    ?>

    <h1>Search Results for "<?= htmlspecialchars($query) ?>"</h1>
    <?php if (count($appointments) > 0): ?>
        <div class="list-group">
            <?php foreach ($appointments as $appointment): ?>
                <a href="/edit-termin/<?= $appointment['id'] ?>" class="list-group-item list-group-item-action">
                    <h5 class="mb-1"><?= htmlspecialchars($appointment['title']) ?></h5>
                    <p class="mb-1"><?= htmlspecialchars($appointment['description']) ?></p>
                    <small><?= htmlspecialchars($appointment['date']) ?> <?= htmlspecialchars($appointment['time']) ?></small>
                </a>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No appointments found.</p>
    <?php endif; ?>
    <?php
    require_once __DIR__ . '/../templates/footer.php';
