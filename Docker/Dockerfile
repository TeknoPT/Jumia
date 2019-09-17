FROM php:7.2-apache
#RUN docker-php-ext-install sqlite3 pdo pdo_mysql pdo_sqlite

COPY src/ /var/

WORKDIR /var/www/html
EXPOSE 80
#CMD [ "php", "./your-script.php" ]