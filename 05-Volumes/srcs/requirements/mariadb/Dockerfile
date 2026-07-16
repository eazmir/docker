FROM debian:latest

RUN	apt update && \
	apt install -y mariadb-server

COPY script.sh /script.sh

COPY init.sql /init.sql

CMD ["bash","script.sh"]
