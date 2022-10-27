<?php
require "confIdioma.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './scripts/esqueleto.php';
    echo $_links; ?>

    <title><?php echo $lang['titRegis'] ?></title>
</head>

<body id="page">
    <?php
    //Validación del formulario
    include 'scripts/funciones.php';
    $nombreError =  $passError = $pass2Error = $emailError = $fechaError = $imagenError = $errorVacios = "";
    $nombreUsuarioOK = $passwordOK = $password2OK = $emailOK = $fechaNacOK = $imagenAvatarOK = "";
    if (!empty($_POST)) {
        $algunError = false;

        // Variables
        $nombreUsuario = htmlspecialchars($_POST["nombreUsuario"]);
        $password = htmlspecialchars($_POST["password1"]);
        $password2 = htmlspecialchars($_POST["password2"]);
        $email = htmlspecialchars($_POST["email"]);
        $fechaNac = htmlspecialchars($_POST["fechaNac"]);
        $imagenAvatar = $_FILES["imagenAvatar"];

        // Comprobamos que los campos no están vacíos y que validan
        if (!empty($nombreUsuario)) {
            //si buscamos al usuario y devuleve un numero quiere decir que existe
            if (buscarUsuario($nombreUsuario) !== false) {
                $nombreError = $lang['errorNomExiste'];
                $algunError = true;
            } else { //No existe ningun usuario registrado con ese nombre, por lo tanto validamos el usuario
                if (!validar($nombreUsuario, VALIDA_USUARIO)) {
                    $nombreError = $lang['errorNom'];
                    $algunError = true;
                } else {
                    $nombreUsuarioOK = $nombreUsuario;
                }
            }
        } else {
            $nombreError = $lang['Username field cannot be empty'];
        }

        if (!empty($password)) {
            if (!validar($password, VALIDA_PASSWORD)) {
                $passError = $lang['errorPass'];
                $algunError = true;
            } else {
                $passwordOK = $password;
            }
        } else {
            $passError = $lang['errorPassVacio'];
        }

        if (!empty($password2)) {
            if ($password == $password2) {
                $password2OK  = $password2;
            } else {
                $pass2Error = $lang['errorPassDist'];
                $algunError = true;
            }
        } else {
            $pass2Error  = $lang['errorRepPass'];
        }

        if (!empty($email)) {
            if (!validar($email, VALIDA_EMAIL)) {
                $emailError = $lang['errorEmail'];
                $algunError = true;
            } else {
                $emailOK = $email;
            }
        } else {
            $emailError = $lang['errorEmailVacio'];
        }

        if (!validarFecha($fechaNac)) {
            $fechaError = $lang['errorEdadMin'];
            $algunError = true;
        } else {
            $fechaNacOK = $fechaNac;
        }

        //Si el tamaño del fichero es mayor que 0, quiere decir que tenemos un fichero.
        if ($imagenAvatar["size"] > 0) {
            //Comprobamos el tipo de imagen del avatar
            $tipo = $imagenAvatar["type"];
            if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png") {
                $imagenAvatarOK = $imagenAvatar;
            } else {
                $algunError = true;
                $imagenError = $lang['errorImg'];
            }
        } else {
            $algunError = true;
            $imagenError = $lang['errorImgVacio'];
        }


        if (empty($nombreUsuario) && empty($password) && empty($email) && empty($fechaNac) && empty($imagenAvatar)) {
            $algunError = true;
            $errorVacios = $lang['errorCampoVacio'];
        }

        //Si no hay errores entra al login y mete el usuario y la contraseña en el registro.
        if (!$algunError) {
            $passCifrado  = sha1($password);
            $ficheroContrasenas = fopen("acceso/usuariosPassword.txt", "a");
            fwrite($ficheroContrasenas, "$nombreUsuario|$passCifrado" . PHP_EOL);
            fclose($ficheroContrasenas);
    ?>
            <form class="login-form">
                <h1><?php echo $lang["bienvenida"]?> <?php echo $nombreUsuario ?></h1>
                <a href="login.php"><input type="button" value="Inicia sesión" name="submit" /></a>
            </form>
        <?php
        } else { ?>
            <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" enctype="multipart/form-data" class="login-form">
                <h1><?php echo $lang['registro'] ?></h1>

                <p><?php echo $lang['nomUsu'] ?> *</p>
                <span class="error"><?php echo $nombreError; ?></span>
                <input type="text" name="nombreUsuario" value="<?php echo $nombreUsuarioOK; ?>">

                <p><?php echo $lang['password'] ?> *</p>
                <span class="error"><?php echo $passError; ?></span>
                <div class="btnAlinear">
                    <input type="password" class="form-control mb-0" id="password1" name="password1" value="<?php echo $passwordOK; ?>">
                    <button id="show_password" class="btnMostrar" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                </div>

                <p><?php echo $lang['repPassword'] ?> *</p>
                <span class="error"><?php echo $pass2Error; ?></span>
                <div class="btnAlinear">
                    <input type="password" class="form-control mb-0" id="password2" name="password2" value="<?php echo $password2OK; ?>">
                    <button id="show_password" class="btnMostrar" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                </div>

                <p><?php echo $lang['email'] ?> *</p>
                <span class="error"><?php echo $emailError; ?></span>
                <input type="text" name="email" value="<?php echo $emailOK; ?>">

                <p> <?php echo $lang['fechNac'] ?> *</p>
                <span class="error"><?php echo $fechaError; ?></span>
                <input type="date" name="fechaNac" value="<?php echo $fechaNacOK; ?>">

                <p><?php echo $lang['imgPerfil'] ?> *</p>
                <span class="error"><?php echo $imagenError; ?></span>
                <input type="file" id="avatar" name="imagenAvatar" accept="image/png, image/gif, image/jpeg" value="<?php echo $imagenAvatarOK; ?>" />

                <h6><?php echo $lang['required'] ?></h6>
                <input type="submit" value=<?php echo $lang['registro'] ?>>
                <span class="error"><?php echo $errorVacios; ?></span>
                <p style="text-decoration-line: underline ;"><a href='login.php'><?php echo $lang['loguearse'] ?></a></p>
            </form>

            <script type="text/javascript">
                function mostrarPassword() {
                    var cambio = document.getElementById("password1");
                    var cambio2 = document.getElementById("password2");
                    if (cambio.type == "password") {
                        cambio.type = "text";
                        cambio2.type = "text";
                        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                    } else {
                        cambio.type = "password";
                        cambio2.type = "password";
                        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                    }
                }
            </script>
        <?php
        }
    } else {



        ?>

        <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" enctype="multipart/form-data" class="login-form">
            <h1><?php echo $lang['registro'] ?></h1>

            <p><?php echo $lang['nomUsu'] ?> *</p>
            <span class="error"><?php echo $nombreError; ?></span>
            <input type="text" name="nombreUsuario" value="<?php echo $nombreUsuarioOK; ?>">

            <p><?php echo $lang['password'] ?> *</p>
            <span class="error"><?php echo $passError; ?></span>
            <div class="btnAlinear">
                <input type="password" class="form-control mb-0" id="password1" name="password1" value="<?php echo $passwordOK; ?>">
                <button id="show_password" class="btnMostrar" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>

            <p><?php echo $lang['repPassword'] ?> *</p>
            <span class="error"><?php echo $pass2Error; ?></span>
            <div class="btnAlinear">
                <input type="password" class="form-control mb-0" id="password2" name="password2" value="<?php echo $password2OK; ?>">
                <button id="show_password" class="btnMostrar" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>

            <p><?php echo $lang['email'] ?> *</p>
            <span class="error"><?php echo $emailError; ?></span>
            <input type="text" name="email" value="<?php echo $emailOK; ?>">

            <p> <?php echo $lang['fechNac'] ?> *</p>
            <span class="error"><?php echo $fechaError; ?></span>
            <input type="date" name="fechaNac" value="<?php echo $fechaNacOK; ?>">

            <p><?php echo $lang['imgPerfil'] ?> *</p>
            <span class="error"><?php echo $imagenError; ?></span>
            <input type="file" id="avatar" name="imagenAvatar" accept="image/png, image/gif, image/jpeg" value="<?php echo $imagenAvatarOK; ?>" />

            <h6><?php echo $lang['required'] ?></h6>
            <input type="submit" value=<?php echo $lang['registro'] ?>>
            <span class="error"><?php echo $errorVacios; ?></span>
            <p style="text-decoration-line: underline ;"><a href='login.php'><?php echo $lang['loguearse'] ?></a></p>
        </form>

        <script type="text/javascript">
            function mostrarPassword() {
                var cambio = document.getElementById("password1");
                var cambio2 = document.getElementById("password2");
                if (cambio.type == "password") {
                    cambio.type = "text";
                    cambio2.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                } else {
                    cambio.type = "password";
                    cambio2.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            }
        </script>
        }

    <?php
    }
    ?>
</body>

</html>