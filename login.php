<?php
    require "confIdioma.php";
?>
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
<<<<<<< HEAD
=======
    include 'scripts/funciones.php';

>>>>>>> 534c47ceb6321deb479118b713b75e5c438f6fcb
    $usuarioRegistrado = "pepe"; //usuario temporal para probar que funciona
    $passwordRegistado = "1234"; //contraseña temporal para probar que funciona
    $usuarioOk = false;
    $passwordOk = false;
    $_usuario_err = "";
    $_password_err = "";
    $_usuPassOK = "";
    $_registro = "";

    if (!empty($_POST)) {
        $usuario = htmlspecialchars($_POST["usuario"]);
        $password = htmlspecialchars($_POST["password"]);

        if (empty($usuario)) {
            $_usuario_err =  "<p>No ha introducido un nombre de usuario</p>";
        } else {
            if (buscarUsuario($usuario) === false) {
                $_usuario_err = "<p>El usuario no está registrado</p>";
                $usuarioBBDD="";
                $passBBDD="";
            } else {
                $aa = recuperarUsuario($usuario);
                $usuarioBBDD = $aa[0];
                $passBBDD = $aa[1];
                var_dump($aa);
            }
        } /*if ($usuario == $usuarioRegistrado) {
            $usuarioOk = true;
        } else if ($usuario != $usuarioRegistrado) {
            $_usuario_err = "<p>Error, usuario no registrado</p>";
        }*/

        if (empty($password)) {
            $_password_err = "<p>No ha introducido una contraseña</p>";
        } else {
            if ($usuario === $usuarioBBDD && $password === $passBBDD) {
                $_usuPassOK = "<h1>Bienvenido $usuario</h1>";
            }
        }
        /*else if ($password == $passwordRegistado) {
            $passwordOk = true;
        } else if ($password != $passwordRegistado) {
            $_password_err =  "<p>Contraseña incorrecta</p>";
        }
*/

<<<<<<< HEAD
        if ($usuarioOk == true && $passwordOk == true) {
            $_usuPassOK = "<h1>Bienvenido $usuario</h1>";
            //propago sesion
            session_start();
            //relleno con los datos del usuario
            $_SESSION['usuario'] = $usuario;
            $_SESSION['pass']=$password;
            //$_SESSION['equipo'] = $_SERVER['REMOTE_ADDR'];            
        }
    }
    if(isset($_SESSION['usuario']))
    {
        echo "<p>Usuario: ".$_SESSION['usuario']."</p>";
        echo "<a href=logout.php>Cerrar Sesion</a>";
    }
    else {    
        //Muestro el formulario de inicio
        ?>
    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
        <h1>Inicio de sesión</h1>
        <p>Nombre de usuario</p>
        <input type="text" name="usuario" placeholder="Nombre de usuario"><span class="error"><?php echo $_usuario_err; ?></span>
        <p>Contraseña</p>
        <input type="password" name="password" id="password" placeholder="Contraseña"><span class="error"><?php echo $_password_err; ?></span><br>
        <input type="submit" value="Acceder">
        <p><a href='registro.php'>¿No tienes cuenta? Regístrate.</a></p>
        <?php echo $_usuPassOK; ?>
=======
        /* if ($usuarioOk == true && $passwordOk == true) {
            $_usuPassOK ="<h1>Bienvenido $usuario</h1>";
        }
        */
    }
    ?>
    <a href="login.php?lang=eng" ><img src="media/flags/england.png" alt="<?=$lang['eng'];?>" title="<?=$lang['eng'];?>" class="eng"/></a>
    <a href="login.php?lang=esp" ><img src="media/flags/espana.png" alt="<?=$lang['esp'];?>" title="<?=$lang['esp'];?>" class="esp" /></a>

    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
    <h1><?php echo $lang['ini']?></h1>
        <p><?php echo $lang['nomUsu']?></p>
        <input type="text" name="usuario" placeholder=<?php echo $lang['nomUsu']?>><span class="error"><?php echo $_usuario_err   ; ?></span>
        <p><?php echo $lang['password']?></p>
        <input type="password" name="password" id="password" placeholder=<?php echo $lang['password']?>><span class="error"><?php echo $_password_err; ?></span><br>
        <input type="submit" value=<?php echo $lang['acceder']?>>
        <?php echo $_usuPassOK; ?>        
>>>>>>> 534c47ceb6321deb479118b713b75e5c438f6fcb
        <?php echo $_registro; ?>
    </form>
</body>
<?php   }?>
</html>