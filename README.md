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
     
     composer install
     
     
 
 * Crear una base de datos 

    mysql -u usuario -p contraseña
    CREATE DATABASE proyecto;
    GRANT ALL PRIVILEGES ON proyecto.* TO 'app'@'localhost' IDENTIFIED BY 'contraseñaweb' WITH GRANT OPTION;
    FLUSH PRIVILEGES;

