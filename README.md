# Gestor de proyectos colaborativos

Aplicación Laravel (SSR con Blade) para gestionar proyectos y participantes con roles y horas.

## Cómo ejecutarla

Solo se necesita Docker. Desde la carpeta del proyecto:

```bash
# 1. Instalar dependencias PHP (solo la primera vez, no hace falta PHP ni Composer)
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html \
    laravelsail/php85-composer:latest composer install --ignore-platform-reqs

# 2. Configuración
cp .env.example .env

# 3. Levantar los contenedores
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate

# 4. Crear las tablas
./vendor/bin/sail artisan migrate

# 5. Compilar los estilos
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

La aplicación queda en http://localhost.

## Datos de prueba (opcional)

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

Crea tres usuarios (`ana@test.com`, `luis@test.com`, `marta@test.com`, contraseña `password`) con proyectos y participantes.