FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    build-essential \
    git \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data

WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm"]