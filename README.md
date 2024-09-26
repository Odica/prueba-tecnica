## Requisitos Previos

- PHP 7.4 o superior
- Composer
- SQLite (usado como base de datos)

## Instalación

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/Odica/prueba-tecnica.git
   cd prueba-tecnica

2. **Instalar dependencias con Composer:**
composer install

3. **Configurar la base de datos:**

Copia el archivo .env.example a .env

Abre el archivo .env y configura la conexión a la base de datos SQLite:

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

4. **Ejecutar migraciones:**

php artisan migrate


5. **Generar la clave de la aplicación:**

php artisan key:generate

6. **Iniciar el servidor de desarrollo:**

php artisan serve


