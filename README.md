### Requisitos Previos para instalar en PC local
Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:
- [XAMPP](https://www.apachefriends.org/index.html)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Sistema de gestión de préstamos de libros

## Guía de instalación 
Clonar el repositorio (o descargarlo como ZIP y descomprimir en el directorio en el servidor local)
```
    git clone https://github.com/vicanmendez/biblioteca-utu
```

Mover al directorio nuevo 

```
cd biblioteca-utu
```
Instalar dependencias faltantes
```
composer install
```
Si FALLA el comando anterior, ejecutar composer update y luego instalar las dependencias
```
composer update
````
install js dependencies
```
npm install && npm run dev
````
Crear el archivo .env
```
cp (unix) or copy (Windows) .env.example .env
```
Generar las claves
```
php artisan key:generate
```
Migrar la base de datos y pre cargarla (sólo incluye usuario admin)
```
php artisan migrate:fresh --seed
```
Inicializar el servidor
```
php artisan serve
```
Credenciales por defecto
```
username: admin
password: admin
```
# Listo el pollo! 🎊🎉 

