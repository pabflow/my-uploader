FROM php:8.2-apache

# Enable file uploads
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN a2enmod rewrite

# Copy all app files to the Apache server root
COPY . /var/www/html/

# Create uploads folder with write permission
RUN mkdir -p /var/www/html/public/uploads && chmod -R 777 /var/www/html/public/uploads
