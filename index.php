<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Inicio</title>
</head>

<body>
    <?php
    //Cargamos las cookies
    if (!isset($_COOKIE["primeraVisita"])) {
        //Las cookies caducan en 1 año.
        setcookie("primeraVisita", time(), time() + 60 * 60 * 24 * 365);
    }
    if (!isset($_COOKIE["tema"])){
        setcookie("tema", ----, time() + 60 * 60 * 24 * 365);

    }
    if (!isset($_COOKIE["idioma"])){
        setcookie("idioma", time(), time() + 60 * 60 * 24 * 365);

    }
    //Abrimos la sesion
    session_start();

    if(isset($_SESSION['usuario']))
    {
        echo "<p>Usuario: ".$_SESSION['usuario']."</p>";
        echo "<a href=cerrarSesion.php>Cerrar Sesion</a>";
        //header("Location: login.php");
    }
    else{
    ?>
    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
        <button onclick="window.open('login.php')">Iniciar Sesión</button>
        <button onclick="window.open('registro.php')">Registrarse</button>
    </form>
    <?php }
    ?>
</body>
</html>