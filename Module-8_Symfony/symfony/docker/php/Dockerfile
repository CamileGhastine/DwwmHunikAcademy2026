FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

RUN apk add --no-cache \
    mysql-dev git unzip curl \
    icu-dev libzip-dev \
    && docker-php-ext-install \
    pdo pdo_mysql \
    intl \
    zip \
    opcache

# Symfony CLI
RUN curl -sLS https://github.com/symfony-cli/symfony-cli/releases/latest/download/symfony-cli_linux_amd64.tar.gz \
    | tar xz -C /usr/local/bin symfony

RUN mkdir -p /.symfony5 && chmod 777 /.symfony5

# Git config
RUN git config --global user.email "camileghastine@hotmail.com" \
    && git config --global user.name "CamileGhastine" \
    && git config --global --add safe.directory /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer