<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <?php
    $usuarioRegistrado = "pepe"; //usuario temporal para probar que funciona
    $passwordRegistado = "1234"; //igual que arriba
    $usuarioOk = "false";
    $passwordOk = "false";


    if (!empty($_POST)) {

        $_usuario_err ="";
        $_password_err ="";

        $usuario = htmlspecialchars($_POST["usuario"]);
        $password = htmlspecialchars($_POST["password"]);

        if (empty($usuario)) {
            $_usuario_err =  "No ha introducido un nombre de usuario";
        } else if ($usuario == $usuarioRegistrado) {
            $usuarioOk = "true";
        } else if ($usuario != $usuarioRegistrado) {
            $_usuario_err = "Error, usuario no registrado";
        }

        if (empty($password)) {
            $_password_err = "No ha introducido una contraseña";
        } else if ($password == $passwordRegistado) {
            $passwordOk = "true";
        } else if ($password != $passwordRegistado){
            $_password_err =  "Contraseña incorrecta";
        }

        if ($usuarioOk == "true" && $passwordOk == "true") {
            echo "Bienvenido $usuario";
        }
    }
    ?>


    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
    <h1>Inicio de sesión</h1>
        <p>Nombre de usuario:</p>
        <input type="text" name="nombreUsu" placeholder="Nombre de usuario">
        <p>Contraseña:</p>
        <input type="password" name="password" id="password" placeholder="Contraseña"><br>
        <button class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
        <input type="submit" value="Acceder">
        <p><a href="registro.php">¿No tienes cuenta? Registrarse.</a></p> 
    </form>
</body>

</html>