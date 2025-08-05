FROM php:8.2-fpm

# Установка только необходимых зависимостей
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Очистка кеша
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Установка только необходимых PHP расширений
RUN docker-php-ext-install pdo_mysql mbstring zip pcntl

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Создание пользователя
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Копирование файлов
COPY --chown=www:www . /var/www

# Рабочая директория
WORKDIR /var/www

RUN chown -R www:www /var/www && \
    chmod -R 775 /var/www

USER www

EXPOSE 9000
CMD ["php-fpm"]