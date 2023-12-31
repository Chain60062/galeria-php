<?php
session_start()
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Minha Galeria</title>
</head>

<body>
    <?php
    require_once "config/Config.php";
    // checa se usuario existe na sessao
    if (isset($_SESSION['user'])) {
        $classe = 'AuthController';
        $metodo = 'view';
    } else {
        $classe = 'AuthController';
        $metodo = 'login';
    }
    if (isset($_GET['classe']) && isset($_GET['metodo'])) {
        $classe = $_GET['classe'] . 'Controller';
        $metodo = $_GET['metodo'];
    }
    require_once "controller/" . $classe . ".php";
    $app = new $classe();
    $app->$metodo();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>