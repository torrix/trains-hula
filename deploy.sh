#!/bin/bash
set -e

echo "Deploying application ..."

git pull origin main

php8.3 /usr/local/bin/composer install --no-interaction --prefer-dist --optimize-autoloader

echo "🚀 Application deployed!"
