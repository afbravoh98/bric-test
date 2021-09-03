## Bric-Test

1. Clonar repositorio
2. Copiar archivo de configuración .env.example y asignar credenciales DB, MAILTRAP.
3. Crear DB nombrada bric-test de mysql 
4. Ejecutar migraciones y generar clave de aplicación:
   
php artisan key:generate && php artisan migrate 

5. Ejecutar seeders, para obtener datos de prueba:


   php artisan db:seed --class=ProductsTableSeeder


#### Rutas CRUD api:

- '/api/products' *GET*
- '/api/products' *POST*
- '/api/products/{id}' *GET*
- '/api/products/{id}' *POST*
- '/api/products/{id}' *DELETE*

6. Para el correcto funcionamiento del cron que envía 
la notificación es necesario configurar el siguiente cront en
   el cron tab del servidor: 

 [* * * * * cd /var/www/bric-test && php artisan schedule:run >> /dev/null 2>&1]

#### Comando para enviar email:
- php artisan send:email



