<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Iniciar sesion</title>
</head>

<body>
<?php
    $usuarioRegistrado = "pepe"; //usuario temporal para probar que funciona
    $passwordRegistado = "1234"; //contraseña temporal para probar que funciona
    $usuarioOk = "false";
    $passwordOk = "false";
    $_usuario_err ="";
    $_password_err ="";
    $_usuPassOK="";
    $_registro = "";

    if (!empty($_POST)) {

        $usuario = htmlspecialchars($_POST["usuario"]);
        $password = htmlspecialchars($_POST["password"]);

        if (empty($usuario)) {
            $_usuario_err =  "<p>No ha introducido un nombre de usuario</p>";
        } else if ($usuario == $usuarioRegistrado) {
            $usuarioOk = "true";
        } else if ($usuario != $usuarioRegistrado) {
            $_usuario_err = "<p>Error, usuario no registrado</p>";
        }

        if (empty($password)) {
            $_password_err = "<p>No ha introducido una contraseña</p>";
        } else if ($password == $passwordRegistado) {
            $passwordOk = "true";
        } else if ($password != $passwordRegistado){
            $_password_err =  "<p>Contraseña incorrecta</p>";
        }

        if ($usuarioOk == "true" && $passwordOk == "true") {
            $_usuPassOK ="<h1>Bienvenido $usuario</h1>";
        }
        else{
            $_registro = "<p><a href="registro.php">¿No tienes cuenta? Regístrate.</a></p>";
        }
    }
    ?>
    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
    <h1>Inicio de sesión</h1>
        <p>Nombre de usuario:</p>
        <input type="text" name="usuario" placeholder="Nombre de usuario"><span class="error"><?php echo $_usuario_err   ; ?></span>
        <p>Contraseña:</p>
        <input type="password" name="password" id="password" placeholder="Contraseña"><span class="error"><?php echo $_password_err; ?></span><br>
        <input type="submit" value="Acceder">
        <?php echo $_usuPassOK; ?>        
        <?php echo $_registro; ?>
    </form>
</body>

</html>