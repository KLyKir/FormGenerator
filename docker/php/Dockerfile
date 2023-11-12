FROM php:8.1-alpine

COPY . /var/www/html

WORKDIR /var/www/html

RUN apk update && apk add curl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install