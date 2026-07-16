FROM debian:latest

WORKDIR /app

RUN	apt update && \
	apt install -y php \
	php-fpm \
	php-mysql

COPY script.sh script.sh

CMD ["bash","script.sh"]
