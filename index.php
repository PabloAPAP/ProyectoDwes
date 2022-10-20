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
    <div class="container-btn-mode">
        <div id="id-sun" class="btn-mode sun active">
            <i class="fas fa-sun"></i>
        </div>
        <div id="id-moon" class="btn-mode moon">
            <i class="fas fa-moon"></i>
        </div>
    </div>

    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
        <button onclick="window.open('login.php')">Iniciar Sesión</button>
        <button onclick="window.open('registro.php')">Registrarse</button>
    </form>
    
</body>
<!--esto es para el boton de dia/noche-->
<script src="index.js"></script>
</html>