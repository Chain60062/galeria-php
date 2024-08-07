# galeria-php
This is a PHP project made years ago on another repository, i intend in finishing it once i have the time and a reason to relearn PHP.  

# Running instructions
To run it on your machine you're gonna need to run the `galeria.sql` script on a PostgreSQL instance and create a `.env` file under the root directory with the database connection credentials, it should mimic the `.env.example` file that's also at the root of the project: 

```
DB_DSN="pgsql:host=localhost;port=5432;dbname=galeria;"
DB_USER="username"
DB_PASSWORD="mypassword"
```
You also need to run `composer install` at the root of the project to install all dependenciesc and `composer dump-autoload` to generate `autoload.php`, after that you can run:
```
php -S localhost:8080
```
To run the project at port 8080 as an example.