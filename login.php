<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>

<body>
<?php
    $usuarioRegistrado = "pepe"; //usuario temporal para probar que funciona
    $passwordRegistado = "1234"; //contraseña temporal para probar que funciona
    $usuarioOk = "false";
    $passwordOk = "false";
    $_usuario_err ="";
    $_password_err ="";

    if (!empty($_POST)) {

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
        <input type="text" name="usuario" placeholder="Nombre de usuario"><span><?php echo $_usuario_err   ; ?></span>
        <p>Contraseña:</p>
        <input type="password" name="password" id="password" placeholder="Contraseña"><span><?php echo $_password_err; ?></span><br>
        <input type="submit" value="Acceder">
        <p><a href="registro.php">¿No tienes cuenta? Regístrate.</a></p> 
    </form>
</body>

</html>