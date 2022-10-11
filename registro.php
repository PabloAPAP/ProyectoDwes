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




    <!-- Validación del formulario -->
    <?php

    include 'funciones.php';
    $nombreError = $passError = $emailError = $fechaError = $imagenError = $errorVacios = "";

    if (!empty($_POST)) {

        // Variables
        $nombreWEB = "HOLA CARACOLA";
        $nombreUsuario = htmlspecialchars($_POST["nombreUsuario"]);
        $password = htmlspecialchars($_POST["password"]);
        $email = htmlspecialchars($_POST["email"]);
        $fechaNac = htmlspecialchars($_POST["fechaNac"]);


        // Comprobamos que los campos no están vacíos y que validan
        if (!empty($nombreUsuario) || !empty($password) || !empty($email) || !empty($fechaNac) || !empty($imagenAvatar)) {
            if (!validar($nombreUsuario, VALIDA_USUARIO)) {
                $nombreError = "El campo 'Nombre de usuario' no puede estar vacío";
            } elseif (!validar($password, VALIDA_PASSWORD)) {
                $passError = "El campo 'Contraseña' no puede estar vacío";
            } elseif (!validar($email, VALIDA_EMAIL)) {
                $emailError = "El campo 'eMail' no puede estar vacío";
            } elseif (!validar($fechaNac, VALIDA_FECHA_NAC)) {
                $fechaError = "El campo 'Fecha de nacimiento' no puede estar vacío";
            } elseif (empty($imagenAvatar)) {
                $imagenError = "Tienes que seleccionar una foto de perfil";
            }
        } else {
           // $errorVacios = "Ningun campo puede estar vacío";
        }

        //Si todas las validaciones en forma son correctas, pasamos a validar la fecha de nacimiento con respecto al calendario.
            if (validarFecha($fechaNac)) {
                echo "Bienvenido a $nombreWEB";
                header("Location: login.php");
            }
        
    }

    ?>

    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"])?>' method="post" enctype="multipart/form-data" class="login-form">
        <h1>Registrarse</h1>    
        <p>Nombre de Usuario:</p>
        <input type="text" name="nombreUsuario">
        <span class="error">* <?php echo $nombreError; ?></span><br><br>
        <p>Contraseña:</p> 
        <input type="password" name="password">
        <span class="error">* <?php echo $passError; ?></span><br><br>
        <p>Correo electrónico:</p>
        <input type="text" name="email"><span class="error">* <?php echo $emailError; ?></span>
        <br><br>
        <p> Fecha de nacimiento:</p>
        <input type="date" name="fechaNac">
        <span class="error">* <?php echo $fechaError; ?></span>
<br><br>

        Imagen de perfil:
        <input type="file" id="avatar" name="imagenAvatar" />
        <span class="error">* <?php echo $imagenError; ?></span>
<br><br>
        <input type="submit" value="Registrarse" name="submit" />

    </form>
</body>

</html>