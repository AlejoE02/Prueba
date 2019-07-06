# Prueba
Prueba tecnica para empresa BRM
Pasos para utilizar el software

"Los puntos con simbolo ($) son comandos desde consola
 ubicado en la ruta del proyecto (C:\xampp\htdocs\Prueba\PruebaBRM)"

1- Clonar proyecto desde GitKraken
2- $ composer install  
3- Copiar el archivo .env.example 
   (.env - copia.example) y cambiar el nombre a .env 
   
4- Dejar la configuracion DB de prueba
   
   DB_HOST_DEVELOPER=127.0.0.1
   
   DB_DATABASE_PRUEBA=prueba
   
   DB_USERNAME_PRUEBA=root
   
   DB_PASSWORD_PRUEBA=

5- Crear la base de datos con el nombre "prueba" en MySQL
   
6- $ php artisan key:generate
7- $ php artisan storage:link
8- Migrar las bases de datos de developer y el modulo asignado ejemplo
   
    $ php artisan migrate

9- $ php artisan db:seed

