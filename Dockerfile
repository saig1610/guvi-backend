# Use the official PHP + Apache image
FROM php:8.1-apache

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy all files in your repo to the Apache web root
COPY . /var/www/html/

# Enable Apache rewrite module (if needed)
RUN a2enmod rewrite
