FROM php:7.2-apache

#Install GIT, GnuPG, NodeJS and NPM

RUN apt-get update && apt-get install -y git gnupg && \
    curl -sL https://deb.nodesource.com/setup_10.x | bash - && \
    apt-get install -y nodejs

#Add Laravel necessary php extensions

RUN apt-get install -y \
    unzip \
    vim \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-install -j$(nproc) zip mysqli pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# Create working directory
RUN mkdir -p /var/www/myapp
ENV APACHE_DOCUMENT_ROOT /var/www/myapp/public
ENV APP_NAME "myapp"

COPY --from=composer:2.2 /usr/bin/composer /usr/local/bin/composer
WORKDIR /var/www/myapp

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Make laravel feel comfortable with mod-rewrite

RUN a2enmod rewrite && service apache2 restart
EXPOSE 80