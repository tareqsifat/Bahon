FROM php:8.0-fpm
# RUN apt-get update &&  && docker-php-ext-install zip
RUN apt-get update && apt-get upgrade -y && \
    apt-get install -y git && \
    apt-get install -y libzip-dev && \
    apt-get install -y software-properties-common && \
    docker-php-ext-install pdo_mysql zip && \
    rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

    # Set working directory
    WORKDIR /var/www/html/

    # Copy existing application directory contents
    COPY ./project /var/www/html/

    # Install Laravel dependencies
    RUN composer install
    RUN chmod -R 777 /var/www/html/vendor

    # Expose port 8000 and start the PHP built-in server
    EXPOSE 9000
    CMD php artisan serve --host=0.0.0.0 --port=9000