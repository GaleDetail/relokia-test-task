FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql \
    && pecl install xdebug-2.9.8 \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
