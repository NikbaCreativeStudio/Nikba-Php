FROM php:7.4-apache
RUN a2enmod rewrite
RUN service apache2 restart
ADD ./ /var/www/html
