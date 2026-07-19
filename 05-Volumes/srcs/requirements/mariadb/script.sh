#!/bin/sh

set -e


mysqld_safe &

retry=1
while [ "$retry" -lt 30 ]; 
do
    if mariadb-admin ping --silent; then
        echo "MariaDB started successfully!"
        break
    fi
    echo "waiting ..."
    sleep 1
    retry=$((retry + 1))
done

echo "MariaDB started successfully!"

mariadb -u root < /init.sql

wait
