FROM php:8.1.0RC5-apache-buster

RUN pecl install xdebug-3.1.1 && docker-php-ext-enable xdebug

RUN apt-get update -y && apt-get install -y \
	libpng-dev \
	libfreetype6-dev \
	libjpeg-dev \
	libxpm-dev \
	libxml2-dev \
	libxslt-dev \
	libmcrypt-dev \
	libwebp-dev

RUN docker-php-ext-install gd
RUN docker-php-ext-install -j$(nproc) intl mysqli pdo_mysql

RUN docker-php-ext-configure gd \
	--with-freetype \
	--with-jpeg \
	--with-xpm \
	--with-webp

RUN a2enmod rewrite
RUN service restart apache2