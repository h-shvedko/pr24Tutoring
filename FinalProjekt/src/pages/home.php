<?php 
require_once __DIR__ . '/../templates/header.php';
?>

<!-- Hero Section -->
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Willkommen zur Terminverwaltung!</h1>
                <p class="lead mb-4">
                    Verwalten Sie Ihre Termine einfach und effizient. Erstellen Sie neue Termine, bearbeiten Sie bestehende Einträge und behalten Sie den Überblick über Ihre Zeitplanung.
                </p>
                <div class="d-flex gap-3">
                    <?php if (!isset($_SESSION['username'])): ?>
                        <a href="/register" class="btn btn-light btn-lg fw-bold">Kostenlos registrieren</a>
                        <a href="/login" class="btn btn-light btn-lg fw-bold">Login</a>
                    <?php else: ?>
                        <a href="/dashboard" class="btn btn-light btn-lg fw-bold">Zu deinem Dashboard</a>
                        <a href="/termine" class="btn btn-light btn-lg fw-bold">Neue Termine</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<!-- Features Section -->
<div class="features-section py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Funktionen</h2>
        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 transition">
                    <div class="card-body text-center">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">📅</div>
                        <h5 class="card-title fw-bold mb-3">Termine verwalten</h5>
                        <p class="card-text text-muted">
                            Erstellen, bearbeiten und löschen Sie Ihre Termine mit wenigen Klicks. Behalten Sie alle Ihre Aufgaben übersichtlich im Blick.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 transition">
                    <div class="card-body text-center">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">👤</div>
                        <h5 class="card-title fw-bold mb-3">Benutzerkonten</h5>
                        <p class="card-text text-muted">
                            Erstellen Sie ein sicheres Benutzerkonto und greifen Sie von überall auf Ihre Termine zu.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 transition">
                    <div class="card-body text-center">
                        <div class="feature-icon mb-3" style="font-size: 3rem;">⚡</div>
                        <h5 class="card-title fw-bold mb-3">Schnell & Einfach</h5>
                        <p class="card-text text-muted">
                            Intuitive Benutzeroberfläche für schnelle und einfache Verwaltung Ihrer Terminkalender.
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
                <h3 class="fw-bold mb-3">Bereit zu beginnen?</h3>
                <p class="text-muted mb-0">
                    Registrieren Sie sich jetzt und starten Sie die Verwaltung Ihrer Termine.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <?php if (!isset($_SESSION['username'])): ?>
                    <a href="/register" class="btn btn-primary btn-lg">Jetzt registrieren</a>
                <?php else: ?>
                    <a href="/termine" class="btn btn-primary btn-lg">Neuen Termin erstellen</a>
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
                <h5 class="fw-bold">Effizient</h5>
                <p class="text-muted">Sparen Sie Zeit bei der Verwaltung Ihrer Termine und bleiben Sie organisiert.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="mb-3">
                    <div class="display-6 text-success fw-bold">🔒</div>
                </div>
                <h5 class="fw-bold">Sicher</h5>
                <p class="text-muted">Ihre Daten werden sicher gespeichert und sind nur für Sie zugänglich.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="mb-3">
                    <div class="display-6 text-info fw-bold">🚀</div>
                </div>
                <h5 class="fw-bold">Zuverlässig</h5>
                <p class="text-muted">Auf jederzeit verfügbar und immer einsatzbereit für Sie.</p>
            </div>
        </div>
    </div>
</div>

<?php 
require_once __DIR__ . '/../templates/footer.php';
?>


