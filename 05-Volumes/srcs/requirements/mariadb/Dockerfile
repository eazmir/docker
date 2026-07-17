FROM debian:latest

RUN	apt update && \
	apt install -y mariadb-server


RUN sed -i 's|bind-address.*=.*127.0.0.1|bind-address = 0.0.0.0|' /etc/mysql/mariadb.conf.d/50-server.cnf 

COPY script.sh /script.sh
COPY init.sql /init.sql

CMD ["bash","script.sh"]
