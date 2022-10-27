<!DOCTYPE html>
<html lang="en">
<?php
    require "confIdioma.php";
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">

    <title><?php echo $lang['titulo'] ?></title>
</head>

<body id="page" class="wrapper">
    
    <!--Botones de idiomas-->
    <a href="index.php?lang=eng"><img src="media/flags/england.png" alt="<?= $lang['eng']; ?>" title="<?= $lang['eng']; ?>" class="eng" /></a>
    <a href="index.php?lang=esp"><img src="media/flags/espana.png" alt="<?= $lang['esp']; ?>" title="<?= $lang['esp']; ?>" class="esp" /></a>
    
    <?php
    //Cargamos las cookies. Caducan en 1 año
    if (!isset($_COOKIE["primeraVisita"])) {
        setcookie("primeraVisita", time(), time() + 60 * 60 * 24 * 365);
    }
    if (!isset($_COOKIE["tema"])) {
        setcookie("tema", time(), time() + 60 * 60 * 24 * 365);
    }
    if (!isset($_COOKIE["idioma"])) {
        setcookie("idioma", time(), time() + 60 * 60 * 24 * 365);
    }

    //Si ya tenemos la sesion iniciada nos manda a la pagina de las batallas
    if (isset($_SESSION["usuario"])) {
        header("Location: batalla.php");
    } else {
    ?>
        <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
            <button onclick="window.open('login.php')"><?php echo $lang['login'] ?></button>
            <button onclick="window.open('registro.php')"><?php echo $lang['registro'] ?></button>
        </form>
    <?php }
    ?>
</body>

</html>