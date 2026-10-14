# Use official PHP image with Apache web server
FROM php:8.2-apache

# Enable Apache rewrite module if needed
RUN a2enmod rewrite

# Set working directory inside the container
WORKDIR /var/www/html

# Copy all project files into the container web root
COPY . /var/www/html/

# Create and ensure applications.json exists with correct write permissions
RUN touch /var/www/html/applications.json \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html \
    && chmod 664 /var/www/html/applications.json

# Expose port 80 for web traffic
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
