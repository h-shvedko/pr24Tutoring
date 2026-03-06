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
