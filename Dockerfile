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

# Install Xdebug
RUN pecl install xdebug \
	&& docker-php-ext-enable xdebug

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
	apt-get install -y nodejs

# Verify installation
RUN node -v && npm -v

# Ensure necessary directories are created
RUN mkdir -p /var/www/html/storage /var/www/html/storage/logs /var/www/html/bootstrap/cache

# Set correct permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

COPY docker/php/conf.d/xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini