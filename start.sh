#!/bin/bash

# Iniciar el servidor PHP
php artisan serve --host=0.0.0.0 --port=80 &

# Verificar si las dependencias están instaladas o no
if [ ! -d "/var/www/html/node_modules" ]; then
      # Si las dependencias no están instaladas o no están actualizadas, ejecutar npm install
    npm install &&
    # Ejecutar npm run dev solo después de npm install
    npm run dev
else
    # Si las dependencias están instaladas y actualizadas, solo ejecutar npm run dev
    npm run dev
fi




