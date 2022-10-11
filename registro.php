<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
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

        //Valida que las contraseñas coinciden
        
        if ($_POST["password"]==$_POST["repassword"])
        {

        }else{
            echo "Las contraseñas no coinciden";
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

    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"])?>' method="post" enctype="multipart/form-data" >
        Nombre de Usuario:
        <input type="text" name="nombreUsuario"><br><br>
        Contraseña:
        <input type="password" name="password"><br><br>
        Confirmar contraseña:
        <input type="password" name="repassword"><br><br>
        eMail:
        <input type="text" name="email"><br><br>
        Fecha de nacimiento:
        <input type="date" name="fechaNac"><br><br>

        Imagen de perfil:
        <input type="file" id="avatar" name="imagenAvatar" /><br><br>
        <input type="submit" value="Registrarse" name="submit" />
    </form>
</body>

</html>