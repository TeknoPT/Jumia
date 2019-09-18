FROM php:7.2-apache

# Install nano
RUN apt-get update -y && \
    apt-get install -y nano

# Install Sqlite pdo pdo_mysql pdo_sqlite
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

ADD src/ /var/
ADD apache/ /

WORKDIR /
EXPOSE 80
#CMD [ "php", "./your-script.php" ]