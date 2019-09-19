FROM php:7.2-apache

# Install nano
RUN apt-get update -y && \
    apt-get install -y nano

# Install Sqlite pdo pdo_mysql pdo_sqlite
RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

# Installing phpunit test
WORKDIR /var/www/html/
RUN wget https://phar.phpunit.de/phpunit-8.3.phar \
    & chmod +x phpunit-8.3.phar

ADD src/ /var/
ADD apache/ /

WORKDIR /
EXPOSE 80
#CMD [ "php", "./your-script.php" ]