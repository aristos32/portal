# Use the PHP 8.2 FPM image
FROM php:8.2-fpm-buster

# Install necessary packages and clean up after installation
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libicu-dev \
    libzip-dev \
    unzip \
    libpq-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql\
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && rm -rf /var/cache/apt/archives/*

# Install Redis extension
RUN pecl install redis \
    && docker-php-ext-enable redis

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Verify installation
RUN node -v && npm -v