FROM debian:latest

WORKDIR /app

RUN	apt update && \
	apt install -y php \
	php-fpm \
	php-mysql

RUN sed -i 's|listen = /run/php/php8.4-fpm.sock|listen = 9000|' /etc/php/8.4/fpm/pool.d/www.conf

COPY script.sh script.sh

CMD ["bash","script.sh"]
