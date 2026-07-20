FROM debian:latest

RUN	apt update && \
	apt install -y nginx 

COPY conf/default 	/etc/nginx/sites-available/default
#COPY ssl/private.key 	/etc/nginx/ssl/private.key
#COPY ssl/certificate.crt /etc/nginx/ssl/certificate.crt
 
CMD	["nginx","-g","daemon off;"]
