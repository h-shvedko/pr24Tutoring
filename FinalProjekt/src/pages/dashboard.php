<?php 
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../Classes/UserService.php';
require_once __DIR__ . '/../Classes/AppointmentService.php';

echo "<h1>Willkommen auf der Dashboard!</h1>";
?>

<div class='container mt-5'>
    <h2>Hier können Sie die Anzahl der User finden.</h2>
    <div class='card w-25'>
        <div class='card-body'>
            <h5 class='card-title'>Anzahl der User</h5>
            <p class='card-text'><?php echo UserService::getNumberOfUsers(); ?></p>
        </div>
    </div>
</div>
<div class='container mt-5'>
    <h2>Hier können Sie die Anzahl ihrer Termine finden.</h2>
    <div class='card w-25'>
        <div class='card-body'>
            <h5 class='card-title'>Anzahl der Termine</h5>
            <p class='card-text'><?php echo AppointmentService::getNumberOfAppointments(); ?></p>
        </div>
    </div>
</div>

<div class='container mt-5'>
    <h2>Hier können Sie die Liste von Morgenterminen finden.</h2>
    <?php
    $startDate = date('Y-m-d', strtotime('+1 day'));
    $endDate = date('Y-m-d', strtotime('+1 day'));
    ?>
    <?php $termine = AppointmentService::getAppointmentsByUserIdAndDateRange($_SESSION['user_id'], $startDate, $endDate); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titel</th>
                <th scope="col">Beschreibung</th>
                <th scope="col">Datum</th>
                <th scope="col">Uhrzeit</th>
                <th scope="col">Ort</th>
                <th scope="col">Aktionen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($termine as $termin): ?>
            <tr>
                <td><?= htmlspecialchars($termin['title']) ?></td>
                <td><?= htmlspecialchars($termin['description']) ?></td>
                <td><?= htmlspecialchars($termin['date']) ?></td>
                <td><?= htmlspecialchars($termin['time']) ?></td>
                <td><?= htmlspecialchars($termin['location']) ?></td>
                <td>
                    <a href="/edit-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-primary">Bearbeiten</a>
                    <a href="/delete-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-danger">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<div class='container mt-5'>
    <h2>Hier können Sie die Liste der allen Termine finden.</h2>
    <?php $termine = AppointmentService::getAppointmentsByUserId($_SESSION['user_id']); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titel</th>
                <th scope="col">Beschreibung</th>
                <th scope="col">Datum</th>
                <th scope="col">Uhrzeit</th>
                <th scope="col">Ort</th>
                <th scope="col">Aktionen</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($termine as $termin): ?>
            <tr>
                <td><?= htmlspecialchars($termin['title']) ?></td>
                <td><?= htmlspecialchars($termin['description']) ?></td>
                <td><?= htmlspecialchars($termin['date']) ?></td>
                <td><?= htmlspecialchars($termin['time']) ?></td>
                <td><?= htmlspecialchars($termin['location']) ?></td>
                <td>
                    <a href="/edit-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-primary">Bearbeiten</a>
                    <a href="/delete-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-danger">Löschen</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php 

require_once __DIR__ . '/../templates/footer.php';


