# galeria-php
This is a PHP project made years ago on another repository, i intend in finishing it once i have the time and a reason to relearn PHP.  


# Running instructions
To run it on your machine you're gonna need to run the `galeria.sql` script on a MySQL or MariaDB instance and create a `Config.php` under the config directory with the database connection credentials, something like this: 

```
config/Config.php
<?php
define('SERVIDOR','mysql:host=localhost;dbname=galeria');
define('USER','my_user');
define('SENHA','my_password');
```