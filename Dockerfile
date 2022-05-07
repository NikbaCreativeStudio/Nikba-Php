FROM php:7.4-apache

RUN apt-get update \
 && apt-get install --assume-yes --no-install-recommends --quiet \
    build-essential \
    libmagickwand-dev \
    # needed for gd
    libz-dev \
    libpq-dev \
    libjpeg-dev \
    libpng-dev \
    libwebp-dev \
    libzip-dev \
    libfreetype6-dev \
 && apt-get clean all

RUN pecl install imagick \
 && docker-php-ext-enable imagick 

#RUN pecl install gd \
 #&& docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-webp \
            --with-freetype; \
    docker-php-ext-install gd; 

RUN a2enmod rewrite
RUN service apache2 restart
ADD ./ /var/www/html
