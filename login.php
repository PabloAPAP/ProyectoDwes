<!DOCTYPE html>
<html>
    <?php
    require "confIdioma.php";
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title><?php echo $lang['acceder'] ?></title>
</head>

<body>
    <?php
    include 'scripts/funciones.php';
    

    $_usuario_err = "";
    $_password_err = "";


    if (!empty($_POST)) {
        $usuario = htmlspecialchars($_POST["usuario"]);
        $password = htmlspecialchars($_POST["password"]);

        if (empty($usuario)) {
            $_usuario_err =  $lang['errorNoUsu'];
        } else {
            if (buscarUsuario($usuario) === false) {
                $_usuario_err = $lang['errorUsuReg'];
                $usuarioBBDD = "";
                $passBBDD = "";
            } else {
                $aa = recuperarUsuario($usuario);
                $usuarioBBDD = $aa[0];
                $passBBDD = $aa[1];
            }
        }

        if (empty($password)) {
            $_password_err = $lang['errorNoPass'];
        } else {
            if ($usuario === $usuarioBBDD && sha1($password) === $passBBDD) {
                //Iniciamos la sesion
                session_start();
                //relleno con los datos del usuario
                $_SESSION["usuario"] = $usuario;
                $_SESSION["pass"] = $password;
                var_dump($_SESSION);
                //$_SESSION['equipo'] = $_SERVER['REMOTE_ADDR']; 
                //header("Location: batalla.php");
            } else {
                $_password_err = "Contraseña incorrecta";
            }
        }
    }
    //Si ya tenemos la sesion iniciada nos manda a la pagina de las batallas
    if (isset($_SESSION["usuario"])) {
        header("Location: batalla.php");
    } else {
       //Muestro el formulario de inicio
    ?>

        <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
            <h1><?php echo $lang['ini'] ?></h1>
            <p><?php echo $lang['nomUsu'] ?></p>
            <span class="error"><?php echo $_usuario_err; ?></span>
            <input type="text" name="usuario" placeholder=<?php echo $lang['nomUsu'] ?>></span>
            <p><?php echo $lang['password'] ?></p>
            <span class="error"><?php echo $_password_err; ?></span>
            <input type="password" name="password" id="password" placeholder=<?php echo $lang['password'] ?>></span><br>
            <input type="submit" value=<?php echo $lang['acceder'] ?>>
            <p style="text-decoration-line: underline ;"><a href='registro.php'><?php echo $lang["registrarse"]?></a></p>
        </form>
</body>

<?php   } ?>

</html>