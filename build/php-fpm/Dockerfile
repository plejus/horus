FROM php:8.2-fpm
RUN apt-get update && apt-get install -y --no-install-recommends git wget zip libzip-dev zlib1g-dev libxml2-dev openssh-client \
    && docker-php-ext-install zip intl mysqli pdo pdo_mysql

RUN apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev
RUN pecl install apcu  && docker-php-ext-enable opcache apcu

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/UTC /etc/localtime
RUN "date"
WORKDIR /var/www/symfony
