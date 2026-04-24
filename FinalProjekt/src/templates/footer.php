</div>
<!-- Footer -->
<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-bold mb-3">Terminverwaltung</h5>
                <p class="text-muted mb-3">
                    Ihre zuverlässige Lösung für die einfache und effiziente Verwaltung von Terminen und Aufgaben.
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="text-light" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3">Schnellzugriff</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/" class="text-muted text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="/dashboard" class="text-muted text-decoration-none">Dashboard</a></li>
                    <li class="mb-2"><a href="/termine" class="text-muted text-decoration-none">Neue Termine</a></li>
                    <?php if (!isset($_SESSION['username'])): ?>
                        <li class="mb-2"><a href="/login" class="text-muted text-decoration-none">Login</a></li>
                        <li class="mb-2"><a href="/register" class="text-muted text-decoration-none">Registrieren</a></li>
                    <?php else: ?>
                        <li class="mb-2"><a href="/logout" class="text-muted text-decoration-none">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Services -->
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-3">Services</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Terminplanung</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Kalender-Integration</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Erinnerungen</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Berichterstattung</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6">
                <h6 class="fw-bold mb-3">Kontakt</h6>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-envelope me-2"></i>
                    <span class="text-muted">info@terminverwaltung.ch</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-phone me-2"></i>
                    <span class="text-muted">+41 78 123 45 67</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    <span class="text-muted">Chur, Schweiz</span>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <hr class="my-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-muted mb-0">&copy; <?php echo date('Y'); ?> Terminverwaltung. Alle Rechte vorbehalten.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-muted text-decoration-none me-3">Datenschutz</a>
                <a href="#" class="text-muted text-decoration-none me-3">AGB</a>
                <a href="#" class="text-muted text-decoration-none">Impressum</a>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>