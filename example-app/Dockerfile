# Use the official PHP base image with the desired version
FROM php:8.1.10-apache


RUN a2enmod rewrite
# Install required extensions and dependencies
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    zip \
    unzip

# Enable necessary PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the composer.json and composer.lock files to the container
COPY composer.json composer.lock ./

# Install project dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN export COMPOSER_ALLOW_SUPERUSER=1
RUN composer update --no-scripts --no-autoloader --ignore-platform-reqs

# Copy the rest of the application code
COPY . .

# Generate Laravel application key
RUN php artisan key:generate

# Set the correct permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose the container port
EXPOSE 8000

# Start the Apache server
CMD ["apache2-foreground"]