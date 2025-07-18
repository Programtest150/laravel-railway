FROM php:8.0-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia todo el proyecto al contenedor
COPY . /var/www/html

WORKDIR /var/www/html

# Cambia el DocumentRoot para que Apache sirva desde public/
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Ajusta permisos para storage, bootstrap/cache y public
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

EXPOSE 80
