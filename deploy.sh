#!/bin/bash
set -e

echo "Deploying application ..."

# Update codebase
git pull origin main

# Install dependencies based on lock file
php8.3 /usr/local/bin/composer install --no-interaction --prefer-dist --optimize-autoloader

# Build frontend
npm run build

echo "🚀 Application deployed!"
