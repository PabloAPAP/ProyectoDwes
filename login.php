<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    $usuarioRegistrado = "pepe";//usuario temporal para probar que funciona
    $passwordRegistado = "1234";//igual que arriba
    $usuarioOk = "false";
    $passwordOk = "false";
    

    if (!empty($_POST)) {
        $usuario = htmlspecialchars($_POST["usuario"]);
        $password = htmlspecialchars($_POST["password"]);

        if (empty($usuario)) {
            echo "No ha introducido un nombre de usuario";
        } else if ($usuario == $usuarioRegistrado) {
            $usuarioOk = "true";
        } else if ($usuario != $usuarioRegistrado) {
            echo "Error, usuario no registrado";
        }

        if (empty($password)) {
            echo "No ha introducido una contraseña";
        } else if ($password == $passwordRegistado) {
            $passwordOk = "true";
        } else if ($password != $passwordRegistado){
            echo "Contraseña incorrecta";
        }

        if( $usuarioOk == "true" && $passwordOk == "true"){
            echo "Bienvenido $usuario";
        }
    }
    ?>


    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post">
        Usuario: <input type="text" name="usuario">
        <br>
        Contraseña: <input type="password" name="password">
        <br>
        <input type="submit" value="acceso">
    </form>
</body>

</html>