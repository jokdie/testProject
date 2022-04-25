FROM php:8.1-fpm

# install php modules
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        apt-utils \
        libpq-dev \
        libpng-dev \
        libicu-dev \
        libzip-dev \
        zip unzip \
        curl \
        ca-certificates \
        g++ \
        git \
    && docker-php-ext-configure intl \
    && docker-php-ext-configure bcmath \
    && docker-php-ext-configure calendar \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install zip \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-ext-install shmop \
    && docker-php-ext-install opcache \
    && docker-php-ext-install calendar \
    && docker-php-ext-install sockets \
    && docker-php-ext-enable zip \
    && pecl install xdebug && docker-php-ext-enable xdebug \
    && pecl install redis && docker-php-ext-enable redis \
    && apt-get autoremove -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY php.ini /usr/local/etc/php/conf.d/php.ini

# todo: удалить после проверки редиса
# install phpredis
#RUN pecl install -o -f redis \
#    && rm -rf /tmp/pear \
#    && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini

# nvm environment variables
ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 16.14.2

# install nvm / node / npm / yarn
RUN curl --silent -o- https://raw.githubusercontent.com/creationix/nvm/v0.31.2/install.sh | bash \
    && . $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm use $NODE_VERSION \
    && npm install -g yarn

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin \
    echo "alias composer='composer'" >> /root/.bashrc

RUN set -ex chown -R www-data:www-data /var/www

# настройки для xdebug
#ADD xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www/app/backend
