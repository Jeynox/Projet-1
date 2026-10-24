# Image de production : PHP + Apache, derrière Caddy (HTTPS) sur le VPS.
FROM php:8.4-apache

# Modules utilisés par le .htaccess, config PHP de production
RUN a2enmod headers rewrite expires \
    && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY apache-security.conf /etc/apache2/conf-enabled/zz-security.conf
COPY php-security.ini "$PHP_INI_DIR/conf.d/zz-security.ini"

COPY --chown=root:root site/ /var/www/html/
RUN find /var/www/html -type d -exec chmod 755 {} + \
    && find /var/www/html -type f -exec chmod 644 {} +

EXPOSE 80
