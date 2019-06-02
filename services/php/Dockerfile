FROM php:7.3.6-apache

ARG USER_ID
ARG GROUP_ID

ENV APACHE_RUN_USER="developer" \
    APACHE_RUN_GROUP="developer"

RUN apt-get update &&\
    apt-get install -y \
        git \
        mysql-client \
        libicu-dev \
        zlib1g-dev \
        libzip-dev &&\
    docker-php-ext-install \
        mbstring \
        intl \
        pdo_mysql \
        zip &&\
    apt-get clean &&\
    rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php &&\
    mv composer.phar /usr/local/bin/composer

RUN groupadd -g $GROUP_ID -o developer &&\
    useradd -m developer -u $USER_ID -g $GROUP_ID

COPY ./myapp.conf /etc/apache2/sites-available/myapp.conf
RUN a2ensite myapp.conf &&\
    a2dissite 000-default.conf

WORKDIR /var/www/app
