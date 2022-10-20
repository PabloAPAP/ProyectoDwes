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
    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
        <button onclick="window.open('login.php')">Iniciar Sesión</button>
        <button onclick="window.open('registro.php')">Registrarse</button>
    </form>
</body>

</html>