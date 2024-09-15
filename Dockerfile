# PHP ve Composer'ı içeren resmi imajı kullan
FROM php:8.2-cli

# Gerekli PHP uzantılarını kur
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git && \
    docker-php-ext-install zip

    
# Composer kurulumunu yap
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Çalışma dizinini ayarla
WORKDIR /app

# Proje dosyalarını konteynıra kopyala
COPY . .

# Composer bağımlılıklarını yükle
RUN composer install

# PHP komutlarını çalıştırmak için default entrypoint belirle
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
