<?php session_start()?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <base href="http://localhost/" /> -->
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Minha Galeria</title>
</head>

<body>
    <?php
    use GaleriaPHP\Controller\AuthControlel;
    require __DIR__ . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();//carregar variaveis de ambiente do arquivo .env
    $dotenv->required(['DB_DSN', 'DB_USER', 'DB_PASSWORD'])->notEmpty();
    // checa se usuario existe na sessao
    if (isset($_SESSION["user"])) {
        $class = "AuthController";
        $method = "view";
    } else {
        $class = "AuthController";
        $method = "login";
    }
    if (isset($_GET["class"]) && isset($_GET["method"])) {
        $class = $_GET["class"] . "Controller";
        $method = $_GET["method"];
    }
    $className = "GaleriaPHP\\Controller\\$class";
    $GaleriaPHP = new $className();
    $GaleriaPHP->$method();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>