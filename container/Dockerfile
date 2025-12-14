# 1️⃣ Use the official PHP image with Apache
FROM php:8.2-apache

# 2️⃣ Copy the PHP files into the Docker container's web folder
COPY . /var/www/html

# 3️⃣ Install PHP extensions (needed for database interaction)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 4️⃣ Expose port 80 to serve the app via HTTP
EXPOSE 80
