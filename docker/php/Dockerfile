FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev libmcrypt-dev mariadb-client \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Установим Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

