#!/bin/sh

set -e


mysqld_safe &

y=0
pip="|"
brack1="["
brack2="]"

while [ "$y" -lt 20 ];
do
	sleep 1
	#echo "${brack1} ${pip} ${brack2}"
	echo "waiting ..."
	y=$((y + 1))
done 

echo "MariaDB started successfully!"

mariadb -u root < /init.sql

wait
