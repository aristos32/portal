# Use the PHP 8.2 FPM image
FROM php:8.2-fpm-bookworm

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

# Install Node.js and npm (Node.js 20 LTS)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
	apt-get install -y nodejs

# Install Supervisor
RUN apt-get install -y supervisor && \
	apt-get clean && \
	rm -rf /var/lib/apt/lists/*

# Verify installation
RUN node -v && npm -v

# Ensure necessary directories are created
RUN mkdir -p /var/www/html/storage /var/www/html/storage/logs /var/www/html/bootstrap/cache

# Set correct permissions for storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy supervisor configuration
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy xdebug configuration
COPY docker/php/conf.d/xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini

# Create supervisor log directory
RUN mkdir -p /var/log/supervisor && \
	chown -R www-data:www-data /var/log/supervisor

# Set supervisor as entrypoint
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]