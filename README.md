# CRUD de Usuarios

Este proyecto es una aplicación web simple para la gestión de usuarios (CRUD: Crear, Leer, Actualizar, Eliminar) desarrollada en PHP. El proyecto está diseñado con el patrón de diseño Modelo-Vista-Controlador (MVC) y sigue el estándar PSR-4 para la carga automática de clases. Este enfoque permite una estructura de código limpia y escalable, adecuada para evolucionar hacia una aplicación más compleja y robusta.

## Características

- **Crear usuarios**: Permite la creación de nuevos usuarios con nombre, correo electrónico, rol y contraseña.
- **Leer usuarios**: Lista todos los usuarios existentes en el sistema.
- **Actualizar usuarios**: Permite la actualización de la información de los usuarios existentes.
- **Eliminar usuarios**: Permite la eliminación de usuarios del sistema.

## Requisitos

- PHP 7.4 o superior
- PostgreSQL 14.0 superior
- Composer

## Instalación

1. Clona el repositorio:
    ```bash
    git clone https://github.com/duvanCode/actividad4.git
    cd actividad4
    ```

2. Instala las dependencias:
    ```bash
    composer install
    ```

3. Configura la base de datos:
    - Crea una base de datos en MySQL.
    - Importa el archivo `database.sql` para crear las tablas necesarias.
    
4. Configura el archivo `.env`:
    ```plaintext
    DB_HOST=localhost
    DB_NAME=nombre_de_tu_base_de_datos
    DB_USER=tu_usuario
    DB_PASS=tu_contraseña
    ```
5. Ejecuta el servidor local:
    ```bash
    php -S localhost:8000 -t public
    ```

6. Abre tu navegador web y navega a `http://localhost:8000`.

## Estructura del Proyecto

```plaintext
actividad4/
├── Controllers/
├── Models/
├── Views/
├── composer.json
├── composer.lock
├── database.sql
├── index.php
└── README.md
