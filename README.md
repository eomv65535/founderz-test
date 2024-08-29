## Instalación

1. Clona el repositorio.
2. Instala las dependencias con `composer install`.
3. Configura el archivo `.env` para tu base de datos.
4. Ejecuta las migraciones con `php artisan migrate`.
5. Ejecuta el comando para inicializar la lista de restaurantes:
   ```bash
   php artisan restaurants:update
6. Para consultar el Api se puede realizar con los siguientes endpoints:
    - /api/
    - /api/get/{id}
    - /api/update-list
