FROM php:8.1-apache

# ✅ Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# ✅ Enable Apache rewrite module (optional for later .htaccess use)
RUN a2enmod rewrite

# ✅ Copy your PHP files to Apache's web root
COPY php/ /var/www/html/

EXPOSE 80
