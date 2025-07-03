FROM php:8.1-apache

# Copy all files inside php/ folder into Apache's web root
COPY php/ /var/www/html/

# Optional but useful if you add `.htaccess` later
RUN a2enmod rewrite

EXPOSE 80
