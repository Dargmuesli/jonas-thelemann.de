# Base image (buster contains PHP >= 7.3, which is needed for "thesoftwarefanatics/php-html-parser")
FROM php:7.4.20-cli-buster@sha256:a9ea3a7100cc507cd191ff8b0832644e22dca84fe38a3bbe2f7f164e47e57c1c AS build

# Update and install build dependencies
# Git is required for gulp's sitemap sitemap.
RUN \
    apt-get update \
    && apt-get install --no-install-recommends -y git nodejs npm \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Import project files
COPY ./ /srv/app/
WORKDIR /srv/app/

# Install Gulp and build project
RUN npm install -g yarn
RUN yarn global add gulp-cli
RUN yarn add gulp@4 -D
RUN yarn build


# Base image (buster contains python2, which is needed for node-sass)
FROM php:7.4.20-fpm-buster@sha256:08a0f6fa0f53cd163245949c55a4cc598f4160d4fd217b5406f2c5575752a8e3 AS development

# Environment variables
ENV PHP_INI_DIR /usr/local/etc/php
ENV PROJECT_NAME jonas-thelemann

# Enable extensions
RUN apk add --no-cache \
    postgresql-dev \
    && docker-php-ext-install \
    pdo_pgsql

# Copy PHP configuration files
COPY --chown=www-data:www-data ./docker/php/* $PHP_INI_DIR/

# Declare required mount points
VOLUME /var/www/$PROJECT_NAME/credentials/$PROJECT_NAME.env

# Update workdir to server files' location
WORKDIR /var/www/$PROJECT_NAME/


# Base image
FROM php:7.4-fpm-alpine@sha256:6d2b823ca55485b102c7cb5769f58d52a4166c5d58a3a103937cdee3cef27ba8 AS production

# Environment variables
ENV PHP_INI_DIR /usr/local/etc/php
ENV PROJECT_NAME jonas-thelemann

# Enable extensions
RUN apk add --no-cache \
    postgresql-dev \
    && docker-php-ext-install \
    pdo_pgsql

# Copy built source files, changing the server files' owner
COPY --chown=www-data:www-data --from=build /srv/app/dist/$PROJECT_NAME/ /usr/src/$PROJECT_NAME/

# Copy PHP configuration files
COPY --chown=www-data:www-data ./docker/php/* $PHP_INI_DIR/

# Copy the entrypoint script to root
COPY ./docker/entrypoint.sh /

# Declare required mount points
VOLUME /var/www/$PROJECT_NAME/credentials/$PROJECT_NAME.env

# Update workdir to server files' location
WORKDIR /var/www/$PROJECT_NAME/

# Specify entrypoint script, that updates the source files in the shared volume (nginx)
ENTRYPOINT ["/entrypoint.sh"]
CMD ["php-fpm"]