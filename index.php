<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <!-- <script>
        function mostrarContrasena() {
            var tipo = document.getElementById("password");
            if (tipo.type == "password") {
                tipo.type = "text";
            } else {
                tipo.type = "password";
            }
        }
    </script> -->
    <title>Inicio</title>
</head>

<body>
    

    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
        <h1>Inicio de sesión</h1>
        <p>Nombre de usuario:</p>
        <input type="text" name="nombreUsu" placeholder="Nombre de usuario">
        <p>Contraseña:</p>
        <input type="password" name="password" id="password" placeholder="Contraseña"><br>
        <!-- <button class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button> -->
        <input type="submit" value="Acceder">
        <p><a href="registro.php">¿No tienes cuenta? Registrarse.</a></p>
    </form>
</body>

</html>