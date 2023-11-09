FROM php:8.1-fpm as fpm

WORKDIR /var/www/app

RUN apt update
RUN apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev libpq-dev zip libpng-dev gcc make \
    && docker-php-ext-install intl opcache pdo pdo_pgsql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir -p var/cache var/log && \
    chown -R www-data:www-data var/cache var/log
