<?php
    require "confIdioma.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './scripts/esqueleto.php'; echo $_links; ?>
    <?php include './Utilidades/botonDiaNoche.php'; ?>
    <?php include './Utilidades/links.php'; ?>
    <title>Regístrate</title>
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
            if (buscarUsuario($nombreUsuario) !== false) { //Ya existe alguien registrado con ese nombre
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
            $nombreError = $lang['errorNomVacio'];
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

        //Si no hay errores entra al login.
        if (!$algunError) {
            //Metemos el usuario y contraseña en el registro
            //$passCifrado  = md5($password, PASSWORD_DEFAULT);
            $ficheroContrasenas = fopen("acceso/usuariosPassword.txt", "a");
            fwrite($ficheroContrasenas, "$nombreUsuario|$password" . PHP_EOL);
            fclose($ficheroContrasenas);
            header("Location: login.php");
        }
    }
    ?>
    <a href="registro.php?lang=eng" ><img src="media/flags/england.png" alt="<?=$lang['eng'];?>" title="<?=$lang['eng'];?>" class="eng"/></a>
    <a href="registro.php?lang=esp" ><img src="media/flags/espana.png" alt="<?=$lang['esp'];?>" title="<?=$lang['esp'];?>" class="esp" /></a>

    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" enctype="multipart/form-data" class="login-form">
        <h1><?php echo $lang['registro']?></h1>

        <p><?php echo $lang['nomUsu']?> *</p>
        <span class="error"><?php echo $nombreError; ?></span>
        <input type="text" name="nombreUsuario" value="<?php echo $nombreUsuarioOK; ?>">
        <p><?php echo $lang['password']?> *</p>
        

            <span class="error"><?php echo $passError; ?></span>
            <div class="btnAlinear">
            <input type="password" class="form-control mb-0" id="password1" name="password1" value="<?php echo $passwordOK; ?>">
            <button id="show_password" class="btnMostrar" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
        </div>

        <br>

        <p><?php echo $lang['repPassword']?> *</p>
        <span class="error"><?php echo $pass2Error; ?></span>
        <div class="btnAlinear">
            <input type="password" class="form-control mb-0" id="password2" name="password2" value="<?php echo $password2OK; ?>">
            <button id="show_password" class="btnMostrar" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
        </div>
        <br>

        <p><?php echo $lang['email']?> *</p>
        <span class="error"><?php echo $emailError; ?></span>
        <input type="text" name="email" value="<?php echo $emailOK; ?>">
        <br><br>

        <p> <?php echo $lang['fechNac']?> *</p>
        <span class="error"><?php echo $fechaError; ?></span>
        <input type="date" name="fechaNac" value="<?php echo $fechaNacOK; ?>">
        <br><br>

        <p><?php echo $lang['imgPerfil']?> *</p>
        <span class="error"><?php echo $imagenError; ?></span>
        <input type="file" id="avatar" name="imagenAvatar" accept="image/png, image/gif, image/jpeg" value="<?php echo $imagenAvatarOK; ?>" />

        <br><br>
        <h5><?php echo $lang['required']?></h5>
        <input type="submit" value="<?php echo $lang['registro']?>" name="submit" />
        <span class="error"><?php echo $errorVacios; ?></span>
        <p><a href='login.php'><?php echo $lang['loguearse']?></a></p>

        <br><br>

    </form>
    <!-- Script para mostrar contraseña -->
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

</body>

</html>