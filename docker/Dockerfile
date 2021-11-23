FROM debian:bullseye

RUN apt-get update && apt-get upgrade -y && apt-get install -y \
	make \
	php-cli \
	php-xml \
	php-mysqlnd \
	default-mysql-client \
	libapache2-mod-php \
	composer

RUN rm -rf /var/www/html
COPY . /root/typo3-cos
COPY docker/localconf.php /root/typo3-cos/localconf.php
RUN make -C /root/typo3-cos install
RUN ln -s /var/www/public /var/www/html && chown -R www-data:www-data /var/www

EXPOSE 80
CMD apachectl -D FOREGROUND
