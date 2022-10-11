<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>




    <!-- Aqui arriba valido el formulario -->
    <?php

    include 'funciones.php';
    if (!empty($_POST)) {

        // Variables
        $nombreWEB = "HOLA CARACOLA";
        $nombreUsuario = htmlspecialchars($_POST["nombreUsuario"]);
        $password = htmlspecialchars($_POST["password"]);
        $email = htmlspecialchars($_POST["email"]);
        $fechaNac = htmlspecialchars($_POST["fechaNac"]);

        // Compruebo que los campos no están vacíos y que validan
        if (!empty($nombreUsuario) && !empty($password) && !empty($email) && !empty($fechaNac)) {
            if (!validar($nombreUsuario, VALIDA_USUARIO)) {
                echo "error de validación del nombre de usuario";
                exit();
            } elseif (!validar($password, VALIDA_PASSWORD)) {
                echo "error de validación del password";
                exit();
            } elseif (!validar($email, VALIDA_EMAIL)) {
                echo "error de validación del email";
                exit();
            } elseif (!validar($fechaNac, VALIDA_FECHA_NAC)) {
                echo "error de validacion de fecha de nacimiento";
                exit();
            }
        } else {
            echo "Ningún campo puede estar vacío";
            exit();
        }

        //Si todas las validaciones en forma son correctas, pasamos a validar la fecha de nacimiento con respecto al calendario.
        if (validarFecha($fechaNac)) {
            echo "Bienvenido a $nombreWEB";
            header("Location: login.php");
            exit();
        } else {
            echo "Solo puedes registrarte si tienes más de 14 años.";
            exit();
        }
    }

    ?>

    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"])?>' method="post" enctype="multipart/form-data" class="login-form">
        <h1>Registrarse</h1>    
        <p>Nombre de Usuario:</p>
        <input type="text" name="nombreUsuario"><br><br>
        <p>Contraseña:</p> 
        <input type="password" name="password"><br><br>
        <p>Correo electrónico:</p>
        <input type="text" name="email"><br><br>
        <p> Fecha de nacimiento:</p>
        <input type="date" name="fechaNac"><br><br>

        <p>Imagen de perfil:</p> 
        <input type="file" id="avatar" name="imagenAvatar" /><br><br>
        <input type="submit" value="Registrarse" name="submit" />
    </form>
</body>

</html>