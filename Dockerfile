FROM php:8.2-apache

RUN a2enmod rewrite

COPY . /var/www/html

RUN cp -r /var/www/html/public/* /var/www/html/

RUN chown -R www-data:www-data /var/www/html

RUN rm -rf /var/www/html/public

EXPOSE 80
