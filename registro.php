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




TODO ESTO ES UN COPIA PEGA TAL CUAL
    <!-- Aqui arriba valido el formulario -->
    <?php

    //Declaro las variables a utilizar
    $_nombreApellidos = $_curso = $_ciclo = "";
    $_nombreApellidosErr = $_cursoErr = $_cicloErr = "";

    if (!empty($_POST)) {
        include_once 'funciones.php';

        $nombreAp = htmlspecialchars($_POST["nombreApellidos"]);
        $curso = htmlspecialchars($_POST["curso"]);
        $ciclo = htmlspecialchars($_POST["ciclo"]);



        if (!empty($nombreAp)) {
            if (!validar("nombre", $nombreAp)) {
                $_nombreApellidosErr = "No has escrito bien el nombre y apellidos";
            } else {
                $_nombreApellidos = $nombreAp;
            }
        } else {
            $_nombreApellidosErr =  "el campo nombre y apellidos no puede estar vacío";
        }
        if (!empty($ciclo)) {
            if (!validar("ciclo", $ciclo)) {
                $_cicloErr = "El ciclo introducido no es ninguno de los válidos";
            } else {
                $_ciclo = $ciclo;
            }
        } else {
            $_cicloErr =  "el campo ciclo no puede estar vacío";
        }
        if (!empty($curso)) {
            if (!validar("curso", $curso)) {
                $_cursoErr = "No has escrito bien el curso: 1º o 2º";
            } else {
                $_curso = $curso;
            }
        } else {

            $_cursoErr =  "el campo curso no puede estar vacío";
        }

        if ($_nombreApellidos != "" && $_curso != "" && $_ciclo != "") {
            //Muestro el mensaje final
            echo "El alumno $_nombreApellidos está matriculado en el curso $_curso del ciclo $_ciclo";
            exit();
        }
    }

    ?>





HASTA AQUI
















    @Pablo on duty
    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" enctype="multipart/form-data">
        Nombre de Usuario:
        <input type="text" name="nombreUsuario"><br>
        Contraseña:
         <input type="text" name="password"><br>
        eMail:
        <input type="text" name="email"><br>
        Fecha de nacimiento:
        <input type="text" name="fechaNac"><br>

        Imagen de perfil:
        <input type="file" id="avatar" name="imagenAvatar" /><br />
        <input type="submit" value="Registrarse" name="submit" />
    </form>
</body>

</html>