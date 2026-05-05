<?php 
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../Classes/UserService.php';
require_once __DIR__ . '/../Classes/AppointmentService.php';

echo "<h1>Welcome to the Dashboard!</h1>";
?>
  <div class="row w-75">
        <div class="col-md-4 mb-3 mt-10">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of users</h5>
                    <p class="card-text">
                        <?php echo UserService::getNumberOfUsers(); ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3 mt-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of appointments</h5>
                    <p class="card-text">
                        <?php echo AppointmentService::getNumberOfAppointments(); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class='container mt-5'>
    <h2>Appointments for tomorrow</h2>
    <?php
    $startDate = date('Y-m-d', strtotime('+1 day'));
    $endDate = date('Y-m-d', strtotime('+1 day'));
    ?>
    <?php $termine = AppointmentService::getAppointmentsByUserIdAndDateRange($_SESSION['user_id'], $startDate, $endDate); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Location</th>
                <th scope="col">Actions</th>
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
                    <a href="/edit-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <a href="/delete-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class='container mt-5'>
    <h2>Appointments for this week</h2>
    <?php
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d', strtotime('sunday this week'));
    ?>
    <?php $termine = AppointmentService::getAppointmentsByUserIdAndDateRange($_SESSION['user_id'], $startDate, $endDate); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Location</th>
                <th scope="col">Actions</th>
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
                    <a href="/edit-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <a href="/delete-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class='container mt-5'>
    <h2>Appointments for this month</h2>
    <?php
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d', strtotime('last day of this month'));
    ?>
    <?php $termine = AppointmentService::getAppointmentsByUserIdAndDateRange($_SESSION['user_id'], $startDate, $endDate); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Location</th>
                <th scope="col">Actions</th>
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
                    <a href="/edit-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <a href="/delete-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class='container mt-5'>
    <h2> All Appointments</h2>
    <?php $termine = AppointmentService::getAppointmentsByUserId($_SESSION['user_id']); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Location</th>
                <th scope="col">Actions</th>
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
                    <a href="/edit-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <a href="/delete-termin/<?= $termin['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php 

require_once __DIR__ . '/../templates/footer.php';


