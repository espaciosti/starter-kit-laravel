# Desarrollos Especiales Espacios de México

## Objetivo
Contar con un punto de partida para el inicio de proyectos de desarrollo web usando el framework de PHP Laravel 5.4, contando con un kit de inicio que permita tener funcionalidades estándar en este tipo de proyectos

## Entorno de desarrollo sugerido
Para poder usar este código se recomienda contar con lo siguiente:

* Equipo de computo 
* PHP 5.6 o superior (Se recomienda PHP 7.1)
* Servidor de Base de datos MySQL 5.5 o superior
* Servidor Web (Puede ser apache 2.2 o NGINX)
* Sequel Pro o MySQL Workbench para manejar MySQL
* Editor de textos (Se recomienda Sublime Text 2 o superior)
* manejador de paquetes PHP composer
* Homestead para Laravel es una excelente opción

## Inicialización del proyecto

* descargar el proyecto de GitHub

Seguir checklist

      git clone https://github.com/espaciosti/starter-kit-laravel.git
      
     cd starter-kit-laravel
     
     cd proyecto_web
     
     cp .env_ejemplo .env
     
     composer install
     
     
 
 * Crear una base de datos 

**mysql -u usuario -p contraseña**
    
**CREATE DATABASE proyecto;**

GRANT ALL PRIVILEGES ON proyecto.* TO 'app'@'localhost' IDENTIFIED BY 'contraseñaweb' WITH GRANT OPTION;
    
**FLUSH PRIVILEGES;**
    

* Modificar archivo .env con los datos de la base de datos
* Ejecutar **php artisan migrate**
* Ejecutar **php artisan db:seed --class=PerfilTableSeeder**
* Ejecutar **php artisan db:seed --class=PerfilMenuTableSeeder**
* Ejecutar **php artisan db:seed --class=MenuTableSeeder**
* Ejecutar **php artisan db:seed --class=UserTableSeeder**

Una vez inicializado el proyecto se puede probar la app colocando el proyecto en una carpeta publica del web server o usando el Web Server integrado de Laravel

**php artisan serve**

ingresar a **http://localhost:8000**

Usar las credenciales 

* Usuario : proyecto@mailinator.com
* Contraseña : Espacios1234

## Notas importantes

* El proyecto utiliza AWS S3 para almacenar archivos, solicitar las API KEY
* El proyecto usa Queue y Workers 
* El proyecto usa el driver database para Sessions
* El proyecto incluye Laravel Scout (Pendiente implementar)
* El proyecto incluye Algolia Driver (Pendiente implementar)

# Software Development (Espacios de México)

## Objective
Start point for web development using Laravel 5.4 framework , with some functional routines, ready to use , like Users CRUD, Profiles CRUD , Permissions and Middleware

## Development Environment (Suggested)
To use this code, you need to use the follow requirements:

* PC or Mac 
* PHP 5.6 or higher (Suggest PHP 7.1)
* Database Server MySQL 5.5 or higher
* Web Server (Apache 2.2 or NGINX)
* Sequel Pro or MySQL Workbench for MySQL management
* Text Editor (Suggest Sublime Text 2 or higher)
* PHP composer
* Homestead for Laravel , the best option

## Project init

* download from GitHub

checklist

      git clone https://github.com/espaciosti/starter-kit-laravel.git
      
     cd starter-kit-laravel
     
     cd proyecto_web
     
     cp .env_ejemplo .env
     
     composer install
     
     
 
 * Create database 

**mysql -u usuario -p contraseña**
    
**CREATE DATABASE proyecto;**

GRANT ALL PRIVILEGES ON proyecto.* TO 'app'@'localhost' IDENTIFIED BY 'contraseñaweb' WITH GRANT OPTION;
    
**FLUSH PRIVILEGES;**
    

* Adjust .env file with database settings
* Run **php artisan migrate**
* Run **php artisan db:seed --class=PerfilTableSeeder**
* Run **php artisan db:seed --class=PerfilMenuTableSeeder**
* Run **php artisan db:seed --class=MenuTableSeeder**
* Run **php artisan db:seed --class=UserTableSeeder**

Once the project is initialized you can test the app by placing the project in a public folder of the web server or by using the integrated Laravel Web Server

**php artisan serve**

Go to **http://localhost:8000**

Use this  

* User : proyecto@mailinator.com
* Password : Espacios1234

## Important

* This project use AWS S3 Bucket for file store, please solicite your API KEYs
* This project implement Queue & Workers 
* This project use database driver for store session
* This project include Laravel Scout (Pending to do)
* This project include Algolia Driver (Pending to do)

