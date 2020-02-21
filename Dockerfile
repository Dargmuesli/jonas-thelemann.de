# Base image (buster contains PHP >= 7.3, which is needed for "thesoftwarefanatics/php-html-parser")
FROM node:13.8.0-buster@sha256:198e0901d087f918e47c55781ac959a5fc69f13fd1810ff083361e6a93dcde44 AS stage_build

# Update and install build dependencies
RUN \
    apt-get update && \
    apt-get install -y composer git php php-dom php-mbstring unzip

# Import project files
COPY ./ /app/
WORKDIR /app/

# Install Gulp and build project
RUN yarn global add gulp-cli
RUN yarn add gulp@4 -D
RUN gulp build

# Base image
FROM php:7.4-fpm-alpine@sha256:eb168b3535ca340c9b54a2028def21de89ed23ab3b266e9c7e65b67cc63b15d1 AS development

# Environment variables
ENV PHP_INI_DIR /usr/local/etc/php
ENV PROJECT_NAME jonas-thelemann
# ENV PROJECT_MODS expires headers macro rewrite ssl

# Enable extensions
RUN apk add --no-cache \
    postgresql-dev \
    && docker-php-ext-install \
    pdo_pgsql

# Copy built source files, changing the server files' owner
COPY --chown=www-data:www-data --from=stage_build /app/dist/$PROJECT_NAME/ /usr/src/$PROJECT_NAME/

# Copy PHP configuration files
COPY --chown=www-data:www-data ./docker/php/* $PHP_INI_DIR/

# Copy the entrypoint script to root
COPY ./docker/entrypoint.sh /

# Declare required mount points
VOLUME /var/www/$PROJECT_NAME/credentials/$PROJECT_NAME.env

# Update workdir to server files' location
WORKDIR /var/www/$PROJECT_NAME/

ENTRYPOINT ["/entrypoint.sh"]
CMD ["php-fpm"]