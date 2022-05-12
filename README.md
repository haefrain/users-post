# Bienvenido a UsersPost!

Esta aplicacion carga Usuarios y Post desde un API, tiene una interfaz grafica para ver la lista de usuarios post y sus comentarios y tiene un job programado que crea comentarios cada hora.


# Instalación

## Prerequisitos

 - Tener conexion a internet
 - Tener un entorno que ejecute PHP v8
 - Tener composer disponible
 - Contar con MySQL como motor de base de datos


## Clonar repositorio

Con el siguiente comando podremos clonar el repositorio
```
git clone https://github.com/haefrain/users-post.git
```
Una vez clonado el proyecto en la raiz del mismo debemos copiar el archivo .example.env colocandole el siguiente nombre ".env" y alli configurar las variables de entorno para conectar con la base de datos

```
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=test
DB_USERNAME=test
DB_PASSWORD=test
```

Ahora debemos instalar las dependencias, para ello nos ubicaremos en la carpeta del proyecto desde la consola y correremos el siguiente comando
```
composer install
```
Una vez instaladas todas las dependencias debemos ejecutar las migraciones para ello nos apoyaremos del siguiente comando
```
php artisan migrate
```
Una vez las migraciones se hayan ejecutado podremos correr el siguiente comando para obtener todos los usuarios
```
php artisan get:users
```
y el siguiente para obtener todos los posts
```
php artisan get:post
```
Para iniciar la escucha de las tareas programadas, en este caso para crear un comentario utilizaremos el comando
```
php artisan schedule:work
```

Finalmente para ver la tabla de Usuarios y Post podremos correr el siguiente comando
````
php artisan serve
````
Con este nos iniciara un servidor el cual nos arrojara una direccion ip por la cual podremos acceder y ver las tablas de datos.
En caso de que tengas un error con la generacion de la llave (esto al ingresar por el navegador) lo unico que debes hacer es correr el siguiente comando
````
php artisan key:generate
````
Esto creara una nueva key en el archivo .env y con solo refrescar la pagina deberia ya funcionarte.