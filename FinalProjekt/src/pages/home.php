<?php 
require_once __DIR__ . '/../templates/header.php';
?>

<!-- Hero Section -->
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Welcome to the appointment management system!</h1>
                <p class="lead mb-4">
                    Manage your appointments easily and efficiently. Create new appointments, edit existing entries, and keep track of your schedule.
                </p>
                <div class="d-flex gap-3">
                    <?php if (!isset($_SESSION['username'])): ?>
                        <a href="/register" class="btn btn-light btn-lg fw-bold">Sign up for free</a>
                        <a href="/login" class="btn btn-light btn-lg fw-bold">Login</a>
                    <?php else: ?>
                        <a href="/dashboard" class="btn btn-light btn-lg fw-bold">Go to your dashboard</a>
                        <a href="/termine" class="btn btn-light btn-lg fw-bold">Create New Appointments</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<!-- Features Section -->
<div class="features-section py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Features</h2>
        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 transition">
                    <div class="card-body text-center">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">📅</div>
                        <h5 class="card-title fw-bold mb-3">Manage Appointments</h5>
                        <p class="card-text text-muted">
                            Create, edit, and delete your appointments with just a few clicks. Keep all your tasks organized and visible at a glance.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 transition">
                    <div class="card-body text-center">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">👤</div>
                        <h5 class="card-title fw-bold mb-3">User Accounts</h5>
                        <p class="card-text text-muted">
                            Create a secure user account and access your appointments from anywhere.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 transition">
                    <div class="card-body text-center">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">⚡</div>
                        <h5 class="card-title fw-bold mb-3">Fast & Easy</h5>
                        <p class="card-text text-muted">
                            Intuitive user interface for quick and easy management of your appointment calendar.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="cta-section bg-light py-5 my-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Ready to get started?</h3>
                <p class="text-muted mb-0">
                    Sign up now and start managing your appointments.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <?php if (!isset($_SESSION['username'])): ?>
                    <a href="/register" class="btn btn-primary btn-lg">Sign up now</a>
                <?php else: ?>
                    <a href="/termine" class="btn btn-primary btn-lg">Create New Appointment</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Additional Info Section -->
<div class="info-section py-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <div class="mb-3">
                    <div class="display-6 text-primary fw-bold">🎯</div>
                </div>
                <h5 class="fw-bold">Efficient</h5>
                <p class="text-muted">Save time managing your appointments and stay organized.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="mb-3">
                    <div class="display-6 text-success fw-bold">🔒</div>
                </div>
                <h5 class="fw-bold">Secure</h5>
                <p class="text-muted">Your data is securely stored and only accessible to you.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="mb-3">
                    <div class="display-6 text-info fw-bold">🚀</div>
                </div>
                <h5 class="fw-bold">Reliable</h5>
                <p class="text-muted">Always available and ready for use whenever you need it.</p>
            </div>
        </div>
    </div>
</div>

<?php 
require_once __DIR__ . '/../templates/footer.php';
?>


