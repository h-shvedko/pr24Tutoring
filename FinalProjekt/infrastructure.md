### 1. Die Ordnerstruktur

Bevor du die Dateien erstellst, stelle sicher, dass deine Ordner so aussehen, damit Docker alles findet:

```text
mein-projekt/
├── docker-compose.yml
├── Dockerfile
├── src/
├── views/
└── public/
    ├── index.php    <-- Hier startet alles
    └── .htaccess    <-- Wichtig für den Router!

```

---

### 2. `Dockerfile`

Diese Datei baut deinen PHP-Server. Sie installiert PHP, den MySQL-Treiber, Composer und stellt den Web-Ordner auf `/public` um.

**Erstelle eine Datei namens `Dockerfile` (ohne Endung):**

```dockerfile
# Wir starten mit PHP 8.2 und Apache
FROM php:8.2-apache

# 1. System-Updates & Installation von nützlichen Tools (git, zip für Composer)
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# 2. PHP-Erweiterungen für MySQL installieren (PDO)
RUN docker-php-ext-install pdo pdo_mysql

# 3. Apache Mod-Rewrite aktivieren (WICHTIG für deinen Router!)
RUN a2enmod rewrite

# 4. Apache Document Root auf /public ändern
# Standard ist /var/www/html. Wir wollen /var/www/html/public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Composer installieren (wir kopieren es vom offiziellen Image)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Arbeitsverzeichnis setzen
WORKDIR /var/www/html

```

---

### 3. `docker-compose.yml`

Diese Datei startet deine drei Server (PHP-Webserver, Datenbank, Datenbank-Oberfläche).

**Erstelle eine Datei namens `docker-compose.yml`:**

```yaml
version: '3.8'

services:
  # --- DEIN PHP WEBSERVER ---
  web:
    build: .
    container_name: termin_app
    ports:
      - "8080:80"  # Erreichbar unter localhost:8080
    volumes:
      - .:/var/www/html  # Spiegelt deinen Ordner in den Container
    depends_on:
      - db
    networks:
      - termin-network

  # --- DIE DATENBANK (MySQL) ---
  db:
    image: mysql:8.0
    container_name: termin_db
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: termin_db  # Erstellt diese DB automatisch
      MYSQL_USER: user
      MYSQL_PASSWORD: password
    volumes:
      - db_data:/var/lib/mysql # Speichert Daten dauerhaft, auch nach Neustart
    ports:
      - "3306:3306"
    networks:
      - termin-network

  # --- PHPMYADMIN (Zum Gucken) ---
  pma:
    image: phpmyadmin/phpmyadmin
    container_name: termin_pma
    environment:
      PMA_HOST: db
      PMA_USER: root
      PMA_PASSWORD: root
    ports:
      - "8081:80" # Erreichbar unter localhost:8081
    depends_on:
      - db
    networks:
      - termin-network

# Volumes und Netzwerke definieren
volumes:
  db_data:

networks:
  termin-network:
    driver: bridge

```

---

### 4. WICHTIG: Die `.htaccess` Datei

Da wir einen **Router** benutzen, müssen wir dem Apache sagen: "Egal was der User eingibt (z.B. `/login` oder `/dashboard`), leite ALLES an die `index.php` weiter."

**Erstelle die Datei `public/.htaccess`:**

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Wenn die Datei oder der Ordner wirklich existiert (z.B. ein Bild), liefere es aus
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d

    # Ansonsten leite alles an index.php weiter
    RewriteRule ^ index.php [QSA,L]
</IfModule>

```

---

### 5. Starten & Testen

Führe diese Schritte in deinem Terminal im Projektordner aus:

1. **Starten:**
```bash
docker-compose up -d --build

```


*(Das `--build` ist beim ersten Mal wichtig, damit er das Dockerfile liest).*
2. **Composer initialisieren:**
   Da PHP im Container läuft, nutzen wir Composer auch dort (oder lokal, wenn du PHP lokal hast).
```bash
# Gehe in den Container
docker exec -it termin_app bash

# Im Container:
composer init 
# (Drücke Enter für Defaults, aber bei "Dependencies" sag 'no' vorerst)

composer require bramus/router
exit

```


3. **Testen:**
* Erstelle eine `public/index.php`:
```php
<?php
echo "Docker läuft! Hallo Welt.";

```


* Öffne im Browser: `http://localhost:8080`



Wenn du "Docker läuft!" siehst, ist deine Infrastruktur bereit für den Code! 🚀
