# Implmentação do php
FROM php:8.3-fpm

# Instalando confs do ambiente
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    vim \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libzip-dev \
    libexif-dev \
    libonig-dev

# Instalando client postgres
RUN apt-get install -y postgresql-client

# Espaço onde vamos trabalhar
WORKDIR /var/www

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalando dependências php
RUN docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl gd

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

# Usuário com permissões
RUN groupadd -g 1000 www

RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www/

COPY --chown=www:www . /var/www/

RUN chown -R www-data:www /var/www/
RUN chmod -R 777 /var/www/

USER www

EXPOSE 9000
CMD [ "php-fpm" ]