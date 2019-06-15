FROM php:7.2-fpm

RUN apt-get update

RUN apt-get install -y gcc make autoconf procps libc-dev pkg-config zlib1g-dev libpq-dev git libicu-dev libxml2-dev librabbitmq-dev libyaml-dev\
    && pecl install amqp yaml\
    && docker-php-ext-configure intl\
    && docker-php-ext-install intl\
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql\
    && docker-php-ext-install pdo pdo_pgsql pgsql\
    && docker-php-ext-install zip xml\
    && docker-php-ext-enable amqp
#    TODO: have some problem with this extension - need to research
#    && echo "extension=yaml.so" > /usr/local/etc/php/conf.d/ext-yaml.ini

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

WORKDIR /var/www/public