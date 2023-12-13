FROM php:8.2-apache

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip

# Enable mod_rewrite
RUN a2enmod rewrite

RUN pecl install xdebug

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip
RUN docker-php-ext-enable xdebug

ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

ADD ./docker/apache.conf /etc/apache2/sites-enabled/000-default.conf

# Copy the application code
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html
