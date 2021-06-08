FROM php:7.3-apache
RUN docker-php-ext-install mysqli pdo_mysql
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    apt-get update \
    && apt-get install mariadb-client -y \
    && docker-php-ext-install zip


COPY . /var/www/html
