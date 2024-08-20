FROM serversideup/php:8.3-fpm-nginx-alpine AS base

# Switch to root so we can do root things
USER root

# Install necessary PHP extensions
RUN install-php-extensions intl

# Copy the application code
COPY . /var/www/html

# Ensure the storage directory exists
RUN chown -R www-data:www-data /var/www/html/storage
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage
RUN chmod -R 775 /var/www/html/bootstrap/cache

# Set the working directory
WORKDIR /var/www/html

# # Expose the necessary port
EXPOSE 8080

# Drop back to our unprivileged user
USER www-data
