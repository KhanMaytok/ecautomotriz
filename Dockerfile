# Use an Alpine-based PHP-FPM image as the base image
FROM php:7.2-fpm-alpine

EXPOSE 9000
EXPOSE 80

RUN rm -rf /var/cache/apk/* && \
    rm -rf /tmp/* && \
    mkdir /run/nginx

# Install system dependencies and PHP extensions
RUN apk --no-cache add \
    icu-dev \
    libstdc++ \
    wget \
    git \
    openrc \
    libzip-dev \
    unzip \
    libmcrypt-dev \
    libxml2-dev \
    curl \
    nano \
    nginx \
    mysql-client \
    libpng-dev \
    ca-certificates \
    bash \
    openssl \
    && docker-php-ext-install pdo pdo_mysql intl zip mbstring json gd xml soap

# Install `mcrypt` extension using PECL
RUN apk --no-cache add g++ make autoconf \
    && pecl install mcrypt-1.0.3 \
    && docker-php-ext-enable mcrypt \
    && apk del g++ make autoconf

ENV TZ="America/Lima"

# Move php configuration file
COPY ./php.ini-production "$PHP_INI_DIR/php.ini"
COPY ./www.conf /usr/local/etc/php-fpm.d/www.conf


WORKDIR /var/www/html

# Copy your Symfony application files into the container
COPY . /var/www/html

# Copy nginx file
RUN echo "upstream symfony { server 127.0.0.1:9000; }" > /etc/nginx/conf.d/upstream.conf
COPY nginx.conf /etc/nginx/conf.d/default.conf

CMD ["./docker_start.sh"]
