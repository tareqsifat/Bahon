FROM debian:bullseye-slim

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    wget \
    jq \
    lsb-release \
    ca-certificates \
    apt-transport-https \
    software-properties-common \
    gnupg \
    sudo \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Add Sury PHP repository for PHP 8.x versions
RUN wget -qO- https://packages.sury.org/php/apt.gpg | tee /etc/apt/trusted.gpg.d/php.gpg >/dev/null \
    && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list \
    && apt-get update

# Install PHP 8.1 and PHP 8.3 with necessary extensions
RUN apt-get install -y \
    php8.1 php8.1-cli php8.1-fpm php8.1-mbstring php8.1-xml php8.1-bcmath php8.1-curl php8.1-zip php8.1-mysql \
    php8.3 php8.3-xml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Verify installations
RUN php -v && composer --version

# Keep container running (change this as needed)
CMD ["tail", "-f", "/dev/null"]
