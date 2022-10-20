<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Registrarse</title>
</head>

<body>
<!-- Validación del formulario -->
    <?php

    include 'funciones.php';
    $nombreError = $passError = $emailError = $fechaError = $imagenError = $errorVacios = "";
    $nombreUsuarioOK = $passwordOK = $emailOK = $fechaNacOK = $imagenAvatarOK = "";

    if (!empty($_POST)) {

        $algunError = false;

        // Variables
        $nombreUsuario = htmlspecialchars($_POST["nombreUsuario"]);
        $password = htmlspecialchars($_POST["password"]);
        $email = htmlspecialchars($_POST["email"]);
        $fechaNac = htmlspecialchars($_POST["fechaNac"]);
        $tamañoAvatar = $_FILES["imagenAvatar"]['size'];
        $imagenAvatar = $_FILES["imagenAvatar"]['name'];


        // Comprobamos que los campos no están vacíos y que validan
        if (!empty($nombreUsuario)) {
            if (!validar($nombreUsuario, VALIDA_USUARIO)) {
                $nombreError = "El campo 'Nombre de Usuario' es incorrecto";
                $algunError = true;
            } else {
                $nombreUsuarioOK = $nombreUsuario;
            }
        } else {
            $nombreError = "El campo 'Nombre de usuario' no puede estar vacío";
        }

        if (!empty($password)) {
            if (!validar($password, VALIDA_PASSWORD)) {
                $passError = "El campo 'Contraseña' es incorrecto";
                $algunError = true;
            } else {
                $passwordOK = $password;
            }
        } else {
            $passError = "El campo 'Contraseña' no puede estar vacío";
        }

        if (!empty($email)) {
            if (!validar($email, VALIDA_EMAIL)) {
                $emailError = "El campo 'Correo electronico' es incorrecto";
                $algunError = true;
            } else {
                $emailOK = $email;
            }
        } else {
            $emailError = "El campo 'Correo electronico' no puede estar vacío";
        }

        if (!validarFecha($fechaNac)) {
            $fechaError = "La edad mínima para registrarse son 14 años";
            $algunError = true;
        } else {
            $fechaNacOK = $fechaNac;
        }

        if ($tamañoAvatar == 0) {
            $imagenError = "Tienes que seleccionar una foto de perfil";
            $algunError = true;
        } else {
            $imagenAvatar = $imagenAvatarOK;
        }

        if (empty($nombreUsuario) && empty($password) && empty($email) && empty($fechaNac) && empty($imagenAvatar)) {
            $algunError = true;
            $errorVacios = "Ningún campo puede estar vacío";
        }

        //Si no hay errores entra al login.
        if (!$algunError) {
            header("Location: login.php");
        }
    }
    ?>

    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" enctype="multipart/form-data" class="login-form">
        <h1>Registrarse</h1>
        <p>Nombre de Usuario <span class="error"> *</span></p>
        <span class="error"><?php echo $nombreError; ?></span>
        <input type="text" name="nombreUsuario" value="<?php echo $nombreUsuarioOK; ?>">

        <p>Contraseña <span class="error"> * </span></p>
        <span class="error"><?php echo $passError; ?></span>
        <input type="password" name="password" value="<?php echo $passwordOK; ?>">
        </span><br><br>

        <p>Correo electrónico <span class="error"> *</span></p>
        <span class="error"><?php echo $emailError; ?></span>
        <input type="text" name="email" value="<?php echo $emailOK; ?>">
        <br><br>

        <p> Fecha de nacimiento <span class="error"> *</span></p>
        <span class="error"><?php echo $fechaError; ?></span>
        <input type="date" name="fechaNac" value="<?php echo $fechaNacOK; ?>">
        <br><br>

        <p>Imagen de perfil <span class="error"> *</span></p>
        <span class="error"><?php echo $imagenError; ?></span>
        <input type="file" id="avatar" name="imagenAvatar" accept="image/png, image/gif, image/jpeg" value="<?php echo $imagenAvatarOK; ?>" />

        <br><br>
        <input type="submit" value="Registrarse" name="submit" />
        <span class="error"><?php echo $errorVacios; ?></span>


    </form>
</body>

</html>