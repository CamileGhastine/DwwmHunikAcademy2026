FROM php:8.2-fpm-alpine

# Arguments pour les droits fichiers
ARG USER_ID=1000
ARG GROUP_ID=1000

WORKDIR /var/www/html

RUN apk add --no-cache \
    mysql-dev git unzip curl \
    icu-dev libzip-dev \
    && docker-php-ext-install \
    pdo pdo_mysql \
    intl \
    zip \
    opcache

# Configuration opcache optimisée pour Symfony
RUN printf "opcache.enable=1\n\
opcache.memory_consumption=256\n\
opcache.max_accelerated_files=20000\n\
opcache.validate_timestamps=0\n\
opcache.interned_strings_buffer=16\n" \
> /usr/local/etc/php/conf.d/opcache.ini

# Symfony CLI (méthode officielle Alpine)
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.alpine.sh' | sh \
    && apk add --no-cache symfony-cli

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Création d'un utilisateur aligné sur l'UID/GID local
RUN addgroup -g ${GROUP_ID} symfony \
    && adduser -u ${USER_ID} -G symfony -s /bin/sh -D symfony \
    && chown -R symfony:symfony /var/www/html

USER symfony

EXPOSE 9000
CMD ["php-fpm"]