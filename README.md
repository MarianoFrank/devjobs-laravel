
# DevJobs con Laravel Sail

Aclaracion, debe tener docker istalado.

Pasos para ejecutar este proyecto en un entorno local. 

Luego de clonar el repositorio, primero debe descargar las dependencias de Composer necesarias ejecutando el siguiente comando

```bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

Crear el archivo `.env`

```bash
  cp .env.example .env
```

Ejecutamos el comando que creará los contenedores y descargará las imágenes necesarias

```bash
./vendor/bin/sail up -d
```
Generamos una `APP_KEY`, utilizada para encriptar datos sensibles, como las sesiones de usuario y otros datos cifrados.

```bash
./vendor/bin/sail artisan key:generate
```
Migrar DB

```bash
./vendor/bin/sail artisan migrate
```

Listo, la aplicacion estara corriendo en `localhost:80` 

# De ahora en adelante...

Para dar de baja la aplicacion ejecute el siguiente comando para borrar contenedores

```bash
./vendor/bin/sail down
```
La proxima vez que quiera iniciar la aplicacion solo debe ejecutar 

```bash
./vendor/bin/sail up -d
```
