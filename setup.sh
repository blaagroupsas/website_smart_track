#!/bin/bash

# Crear directorios necesarios si no existen
mkdir -p storage/framework/{sessions,views,cache}
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Establecer permisos
chmod -R 775 storage bootstrap/cache
