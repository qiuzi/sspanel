FROM php:8.2.7-fpm-alpine3.18

LABEL maintainer="Ric Harvey <ric@squarecows.com>"

ENV php_conf /usr/local/etc/php-fpm.conf
ENV fpm_conf /usr/local/etc/php-fpm.d/www.conf
ENV php_vars /usr/local/etc/php/conf.d/docker-vars.ini

ENV LUAJIT_LIB=/usr/lib
ENV LUAJIT_INC=/usr/include/luajit-2.1

# resolves #166
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php
RUN apk add --no-cache --repository http://dl-3.alpinelinux.org/alpine/edge/community gnu-libiconv


# INstall nginx + lua and devel kit
RUN apk add --no-cache nginx \
    nginx-mod-http-lua \
    nginx-mod-devel-kit

RUN echo @testing https://dl-cdn.alpinelinux.org/alpine/edge/testing >> /etc/apk/repositories && \
    echo /etc/apk/respositories && \
    apk update && apk upgrade &&\
    apk add --no-cache \
    bash \
    openssh-client \
    wget \
    supervisor \
    curl \
    libcurl \
    libpq \
    git \
    python3 \
    py3-pip \
    dialog \
    autoconf \
    make \
    libzip-dev \
    bzip2-dev \
    icu-dev \
    tzdata \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxslt-dev \
    gcc 
RUN apk add --update \
    yaml

# Add depends for building
RUN apk add --update --virtual builds \
    libc-dev \
    yaml-dev \
    autoconf \
    re2c \
    g++ \
    gc
RUN printf "\n" | pecl install yaml-2.0.0 && docker-php-ext-enable yaml    
RUN apk add --no-cache --virtual .sys-deps \
    musl-dev \
    linux-headers \
    augeas-dev \
    libmcrypt-dev \
    python3-dev \
    libffi-dev \
    sqlite-dev \
    imap-dev \
    postgresql-dev \
    lua-resty-core \
    libjpeg-turbo-dev \
    libwebp-dev \
    zlib-dev \
    libxpm-dev \
    libpng \
    libpng-dev && \
  # Install PHP modules
    docker-php-ext-configure gd \
      --enable-gd \
      --with-freetype \
      --with-jpeg && \
    docker-php-ext-install gd && \
     pip install --upgrade pip && \
    docker-php-ext-install pdo_mysql mysqli pdo_sqlite pgsql pdo_pgsql exif intl xsl soap zip opcache bcmath xml && \
    pecl install -o -f xdebug && \
    pecl install -o -f redis && \ 
    pecl install -o -f mongodb && \
    echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini && \
    echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongodb.ini && \
    echo "zend_extension=xdebug" > /usr/local/etc/php/conf.d/xdebug.ini && \
    docker-php-source delete && \
    mkdir -p /var/www/app && \
  # Install composer and certbot
    mkdir -p /var/log/supervisor && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --quiet --install-dir=/usr/bin --filename=composer && \
    rm composer-setup.php && \  
  #  pip3 install -U pip && \
    pip3 install -U certbot && \
    mkdir -p /etc/letsencrypt/webrootauth && \
    apk del gcc musl-dev linux-headers libffi-dev augeas-dev python3-dev make autoconf && \
    apk del .sys-deps

ADD conf/supervisord.conf /etc/supervisord.conf

# Copy our nginx config
RUN rm -Rf /etc/nginx/nginx.conf
ADD conf/nginx.conf /etc/nginx/nginx.conf

# nginx site conf
RUN mkdir -p /etc/nginx/sites-available/ && \
mkdir -p /etc/nginx/sites-enabled/ && \
mkdir -p /etc/nginx/ssl/ && \
rm -Rf /var/www/* && \
mkdir /var/www/html/
ADD conf/nginx-site.conf /etc/nginx/sites-available/default.conf
RUN ln -s /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/default.conf

# tweak php-fpm config
RUN echo "cgi.fix_pathinfo=0" > ${php_vars} &&\
    echo "upload_max_filesize = 100M"  >> ${php_vars} &&\
    echo "post_max_size = 100M"  >> ${php_vars} &&\
    echo "variables_order = \"EGPCS\""  >> ${php_vars} && \
    echo "memory_limit = 128M"  >> ${php_vars} && \
    sed -i \
        -e "s/;catch_workers_output\s*=\s*yes/catch_workers_output = yes/g" \
        -e "s/pm.max_children = 5/pm.max_children = 4/g" \
        -e "s/pm.start_servers = 2/pm.start_servers = 3/g" \
        -e "s/pm.min_spare_servers = 1/pm.min_spare_servers = 2/g" \
        -e "s/pm.max_spare_servers = 3/pm.max_spare_servers = 4/g" \
        -e "s/;pm.max_requests = 500/pm.max_requests = 800/g" \
        -e "s/;listen.mode = 0660/listen.mode = 0666/g" \
        -e "s/;listen.owner = www-data/listen.owner = www-data/g" \
        -e "s/;listen.group = www-data/listen.group = www-data/g" \
        -e "s/listen = 127.0.0.1:9000/listen = \/var\/run\/php-fpm.sock/g" \
        -e "s/^;clear_env = no$/clear_env = no/" \
        ${fpm_conf}
#    ln -s /etc/php7/php.ini /etc/php7/conf.d/php.ini && \
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini && \
	sed -i \
	    -e "s/;opcache/opcache/g" \
	    -e "s/;zend_extension=opcache/zend_extension=opcache/g" \
            /usr/local/etc/php/php.ini


# Add Scripts
ADD scripts/start.sh /start.sh
#ADD conf/appprofile.example.php /appprofile.example.php
RUN chmod 755 /start.sh
EXPOSE 80/tcp
# copy in code

#USER root
WORKDIR "/var/www/html"
RUN git clone -b 2023.6 https://github.com/Anankke/SSPanel-Uim.git .
#RUN composer install
RUN chmod 755 -R *
#RUN chown nginx:nginx -R *
RUN chown www-data:www-data -R *
#RUN cp /appprofile.example.php config/appprofile.php

CMD ["/start.sh"]
