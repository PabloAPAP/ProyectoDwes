    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include './scripts/esqueleto.php';
        echo $_links; ?>
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
            if (empty($nombreUsuario)) {
                //si buscamos al usuario y devuleve un numero quiere decir que existe
                if (buscarUsuario($nombreUsuario) !== false) {
                }
                if (!validar($nombreUsuario, VALIDA_USUARIO)) {
                    $nombreError = "El campo 'Nombre de Usuario' es incorrecto";
                    if (buscarUsuario($nombreUsuario) !== false) { //Ya existe alguien registrado con ese nombre
                        $nombreError = "Ya existe un usuario con ese nombre";
                        $algunError = true;
                    } else { //No existe ningun usuario registrado con ese nombre, por lo tanto validamos el usuario
                        if (!validar($nombreUsuario, VALIDA_USUARIO)) {
                            $nombreError = "El campo 'Nombre de Usuario' es incorrecto";
                            $algunError = true;
                        } else {


                            $nombreUsuarioOK = $nombreUsuario;
                        }
                    }
                }
            } else {
                $nombreError = "El campo 'Nombre de usuario' no puede estar vacío";
            }

            if (!empty($password)) {
                if (!validar($password, VALIDA_PASSWORD)) {
                    $passError = "La contraseña debe contener mayúsculas, minúsculas y números. Al menos 8 caracteres";
                    $algunError = true;
                } else {
                    $passwordOK = $password;
                }
            } else {
                $passError = "El campo 'Contraseña' no puede estar vacío";
            }

            if (!empty($password2)) {
                if ($password == $password2) {
                    $password2OK  = $password2;
                } else {
                    $pass2Error = "Las contraseñas no coinciden";
                    $algunError = true;
                }
            } else {
                $pass2Error  = "El campo 'Repite la constraseña' no puede estar vacío";
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

            //Si el tamaño del fichero es mayor que 0, quiere decir que tenemos un fichero.
            if ($imagenAvatar["size"] > 0) {
                //Comprobamos el tipo de imagen del avatar
                $tipo = $imagenAvatar["type"];
                if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png") {
                    $imagenAvatarOK = $imagenAvatar;
                } else {
                    $algunError = true;
                    $imagenError = "El fichero debe ser jpeg, jpg o png";
                }
            } else {
                $algunError = true;
                $imagenError = "Tienes que subir una imagen de perfil";
            }


            if (empty($nombreUsuario) && empty($password) && empty($email) && empty($fechaNac) && empty($imagenAvatar)) {
                $algunError = true;
                $errorVacios = "Ningún campo puede estar vacío";
            }

            //Si no hay errores entra al login y mete el usuario y la contraseña en el registro.
            if (!$algunError) {
                $passCifrado  = md5($password, PASSWORD_DEFAULT);
                $ficheroContrasenas = fopen("acceso/usuariosPassword.txt", "a");
                fwrite($ficheroContrasenas, "$nombreUsuario|$passCifrado" . PHP_EOL);
                fclose($ficheroContrasenas);
                header("Location: login.php");
            }
        }

        ?>

        <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" enctype="multipart/form-data" class="login-form">
            <h1>Regístrate</h1>

            <p>Nombre de Usuario *</p>
            <span class="error"><?php echo $nombreError; ?></span>
            <input type="text" name="nombreUsuario" value="<?php echo $nombreUsuarioOK; ?>">

            <p>Contraseña *</p>
            <span class="error"><?php echo $passError; ?></span>
            <div class="btnAlinear">
                <input type="password" class="form-control mb-0" id="password1" name="password1" value="<?php echo $passwordOK; ?>">
                <button id="show_password" class="btnMostrar" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>

            <p>Repite la contraseña *</p>
            <span class="error"><?php echo $pass2Error; ?></span>
            <div class="btnAlinear">
                <input type="password" class="form-control mb-0" id="password2" name="password2" value="<?php echo $password2OK; ?>">
                <button id="show_password" class="btnMostrar" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>

            <p>Correo electrónico *</p>
            <span class="error"><?php echo $emailError; ?></span>
            <input type="text" name="email" value="<?php echo $emailOK; ?>">

            <p> Fecha de nacimiento *</p>
            <span class="error"><?php echo $fechaError; ?></span>
            <input type="date" name="fechaNac" value="<?php echo $fechaNacOK; ?>">

            <p>Imagen de perfil *</p>
            <span class="error"><?php echo $imagenError; ?></span>
            <input type="file" id="avatar" name="imagenAvatar" accept="image/png, image/gif, image/jpeg" value="<?php echo $imagenAvatarOK; ?>" />

            <h6>Los campos marcados con * son obligatorios</h6>
            <input type="submit" value="Registrarse" name="submit" />
            <span class="error"><?php echo $errorVacios; ?></span>
            <p style="text-decoration-line: underline ;"><a href='login.php'>¿Ya tienes cuenta? Logueate</a></p>
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

    </body>

    </html>