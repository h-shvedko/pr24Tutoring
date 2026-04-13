<?php 
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../Classes/UserService.php';

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
            <p class='card-text'><?php echo UserService::getNumberOfUsers(); ?></p>
        </div>
    </div>
</div>
<?php 

require_once __DIR__ . '/../templates/footer.php';


