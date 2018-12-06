FROM php:7.1-apache 

# Update image
RUN apt-get update && apt-get install -y

## 
RUN docker-php-ext-install pdo pdo_mysql

# Install Xdebug
RUN curl -fsSL 'https://xdebug.org/files/xdebug-2.5.1.tgz' -o xdebug.tar.gz \
    && mkdir -p xdebug \
    && tar -xf xdebug.tar.gz -C xdebug --strip-components=1 \
    && rm xdebug.tar.gz \
    && ( \
    cd xdebug \
    && phpize \
    && ./configure --enable-xdebug \
    && make -j$(nproc) \
    && make install \
    ) \
    && rm -r xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get install -y libpng-dev
RUN docker-php-ext-install gd
  

# Copy php.ini into image
COPY php.ini.example /usr/local/etc/php/php.ini