FROM php:8.2-apache


# Variable por defecto (puedes sobrescribir en build o en runtime)
ARG APP_SUBDIR=public
ENV APP_SUBDIR=${APP_SUBDIR}


# Evitar prompts interactivos
ENV DEBIAN_FRONTEND=noninteractive


# Instalar utilidades y extensiones PHP comunes
RUN apt-get update && apt-get install -y --no-install-recommends \
git \
zip unzip \
libzip-dev \
libpq-dev \
libicu-dev \
libonig-dev \
libpng-dev \
libjpeg-dev \
libfreetype6-dev \
libxml2-dev \
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install -j$(nproc) pdo_mysql pdo_pgsql intl mbstring zip xml gd bcmath opcache \
&& apt-get clean && rm -rf /var/lib/apt/lists/*


# Habilitar módulos Apache útiles
RUN a2enmod rewrite headers expires deflate


# Instalar Composer desde la imagen oficial de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# Copiar todo el repo al contenedor
COPY . /var/www/html/


# Copiar entrypoint que ajusta DocumentRoot en tiempo de arranque
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh


# Ajustes iniciales de permisos
RUN chown -R www-data:www-data /var/www/html \
&& find /var/www/html -type d -exec chmod 755 {} \; \
&& find /var/www/html -type f -exec chmod 644 {} \;


EXPOSE 80


ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]