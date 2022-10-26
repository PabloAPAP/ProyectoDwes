<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Inicio</title>
</head>

<body id="page" class="wrapper">
    <?php
    //Cargamos las cookies. Caducan en 1 año
    if (!isset($_COOKIE["primeraVisita"])) {
        setcookie("primeraVisita", time(), time() + 60 * 60 * 24 * 365);
    }
    if (!isset($_COOKIE["tema"])) {
        setcookie("tema", time(), time() + 60 * 60 * 24 * 365);
    }
    if (!isset($_COOKIE["idioma"])) {
        setcookie("idioma", time(), time() + 60 * 60 * 24 * 365);
    }

    //Si ya tenemos la sesion iniciada nos manda a la pagina de las batallas
    if (isset($_SESSION["usuario"])) {
        header("Location: batalla.php");
    } else {
    ?>
        <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
            <button onclick="window.open('login.php')">Iniciar Sesión</button>
            <button onclick="window.open('registro.php')">Registrarse</button>
        </form>
    <?php }
    ?>
</body>

</html>