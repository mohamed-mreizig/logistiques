# Base Image for PHP with FPM
FROM php:8.4.1-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    libpq-dev \
    curl \
    git \
    unzip \
    libzip-dev \
    supervisor \
    npm \ 
    nodejs \ 
    libmagickwand-dev --no-install-recommends \
    && docker-php-ext-install pdo pdo_pgsql zip gd \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./php.ini /usr/local/etc/php/conf.d/custom.ini

# Copy Nginx configuration
COPY ./nginx.conf /etc/nginx/sites-available/default

# Copy Laravel project files
COPY . .

# Install Laravel dependencies
RUN composer update
RUN composer install --no-dev --optimize-autoloader

RUN php artisan key:generate
RUN php artisan storage:link

# Install frontend dependencies (Node.js)
RUN npm install 
RUN npm run build

# Permissions for storage and cache
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Expose Nginx and PHP-FPM ports
EXPOSE 80

# Start Nginx and PHP-FPM using Supervisor
COPY ./supervisord.conf /etc/supervisor/supervisord.conf

CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
