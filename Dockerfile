FROM php:8.0-apache

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip mbstring exif pcntl bcmath gd

# Instala Composer desde imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia todos los archivos del proyecto al contenedor
COPY . /var/www/html

# Define el directorio de trabajo
WORKDIR /var/www/html

# Da permisos a Laravel para escribir en storage y bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Habilita mod_rewrite para que Laravel funcione bien
RUN a2enmod rewrite

# Expone el puerto 80 (el estándar de Apache)
EXPOSE 80
