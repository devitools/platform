#!/usr/bin/env bash

echo " ~> [hooks\install.sh] on [${1}, ${2}]"

cd "${1}" || exit

docker exec cloud-nginx bash -c "su -c 'composer install --no-interaction' application"
docker exec cloud-nginx bash -c "su -c 'php artisan migrate --force' application"
