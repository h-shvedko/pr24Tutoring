<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../Classes/AppointmentService.php';

$appintmentService = new AppointmentService();
$appintmentService->deleteAppointment($_GET['id'] ?? null);
header('Location: /dashboard');
exit();