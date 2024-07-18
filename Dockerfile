# imagen de dockerhub que descargara
FROM php:8.1.20RC1-fpm-alpine3.16

# algunas configuraciones para que funcione el contenedor
RUN docker-php-ext-install pdo pdo_mysql

RUN apk update \
    && apk upgrade \
    && apk add --no-cache \
        freetype-dev \
        libpng-dev \
        jpeg-dev \
        libjpeg-turbo-dev \
        libzip-dev

RUN docker-php-ext-install zip

RUN docker-php-ext-install gd

RUN apk update && apk add bash

RUN apk add npm

# instala composer en el contenedor
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# da permisos para editar los archivos en esta ruta del container
RUN chown -R www-data:www-data /var/www
RUN chmod 755 /var/www