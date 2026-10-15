FROM php:8.2-apache
RUN a2enmod rewrite
WORKDIR /var/www/html
COPY . /var/www/html/
RUN touch /var/www/html/applications.json \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html \
    && chmod 666 /var/www/html/applications.json
EXPOSE 80
CMD ["apache2-foreground"]
