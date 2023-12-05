#!/bin/bash
nginx -g "pid /tmp/nginx.pid;" &
php-fpm -F
