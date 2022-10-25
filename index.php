<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Inicio</title>
</head>

<body id="page" class="wrapper">
    <?php
    //Cargamos las cookies
    if(!isset($_COOKIE["primeraVisita"])){
        //La cookie caduca en 1 año. La vamos a utilizar después para guardar las preferencias de tema e idioma.
        setcookie("primeraVisita", time(), time()+60*60*24*365);
    }
    //Abrimos la sesion
    session_start();

    ?>
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
<script src="index.js"></script>
</html>