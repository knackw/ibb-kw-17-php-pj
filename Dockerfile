FROM php:7.4-apache

RUN apt-get update -y && apt-get install -y libjpeg62-turbo-dev libpng-dev git libzip-dev zip

RUN docker-php-ext-configure gd --with-jpeg=/usr/include/
RUN docker-php-ext-install mysqli pdo_mysql gd zip
RUN pecl install xdebug-2.9.8
RUN curl -L https://getcomposer.org/composer-stable.phar -o /usr/local/bin/composer && chmod +x /usr/local/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY "./php-upload.ini" "$PHP_INI_DIR/conf.d/php-upload.ini"
COPY "./php-xdebug.ini" "$PHP_INI_DIR/conf.d/php-xdebug.ini"

RUN docker-php-ext-enable xdebug
RUN a2enmod rewrite