<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Classes/AppointmentService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $location = trim($_POST['location'] ?? '');
    $userId = $_SESSION['user_id'] ?? null;

    $appointmentService = new AppointmentService();

    if ($appointmentService->createAppointment($title, $description, $date, $time, $location, $userId)) {
        header('Location: /dashboard');
        exit();
    }
}
require_once __DIR__ . '/../templates/header.php';
?>

<h1>New Appointment</h1>

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
    <div>
        <label class="form-label" for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($title ?? '') ?>" class="form-control">
    </div>

    <br>

    <div>
        <label class="form-label" for="description">Description:</label><br>
        <textarea id="description" name="description" class="form-control"><?= htmlspecialchars($description ?? '') ?></textarea>
    </div>

    <br>

    <div>
        <label class="form-label" for="date">Date:</label><br>
        <input type="date" id="date" name="date" value="<?= htmlspecialchars($date ?? '') ?>" class="form-control">
    </div>

    <br>

    <div>
        <label class="form-label" for="time">Time:</label><br>
        <input type="time" id="time" name="time" value="<?= htmlspecialchars($time ?? '') ?>" class="form-control">
    </div>

    <br>

    <div>
        <label class="form-label" for="location">Location:</label><br>
        <input type="text" id="location" name="location" value="<?= htmlspecialchars($location ?? '') ?>" class="form-control">
    </div>

    <br>

    <button type="submit" class="btn btn-primary">Save Appointment</button>
</form>

<?php
require_once __DIR__ . '/../templates/footer.php';