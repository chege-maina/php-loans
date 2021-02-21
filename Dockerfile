FROM php:8.0-apache
RUN docker-php-ext-install mysqli
# RUN chmod 777 /var/www/html/uploads
