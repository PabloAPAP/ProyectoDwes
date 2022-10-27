<?php
include "./scripts/confIdioma.php";
include 'scripts/funciones.php';
if (!empty($_COOKIE['tema'])) $style = $_COOKIE['tema'];
if (empty($_COOKIE['tema'])) $style = "style";
include './scripts/enlaces.php';
echo $_links;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $style ?>.css" type="text/css" media="all">
    <title><?php echo $lang['titulo'] ?></title>
</head>

<body>
    <!--Botones de idiomas-->
    <a href="index.php?lang=eng"><img src="media/flags/england.png" alt="<?= $lang['eng']; ?>" title="<?= $lang['eng']; ?>" class="eng" /></a>
    <a href="index.php?lang=esp"><img src="media/flags/espana.png" alt="<?= $lang['esp']; ?>" title="<?= $lang['esp']; ?>" class="esp" /></a>
    <!--Botones temas-->
    <div class="container-btn-mode" style="display: flex;">
        <a href="./scripts/tema.php?usertheme=./css/style"><img class="imgsol" src="./media/tema/sol.png"></a>
        <a href="./scripts/tema.php?usertheme=./css/styleDarkMode"><img class="imgluna" src="./media/tema/luna.png"></a>
    </div>
    <?php
    //Si ya tenemos la sesion iniciada nos manda a la pagina de las batallas
    if (isset($_SESSION["usuario"])) {
        //header("Location: index.php");
        $nombreUsuario = $_SESSION['usuario'];
    ?>
        <div class=a>
            <h1 class="login-form"><?php echo $lang["saludo"] . " " . $nombreUsuario; ?></h1>
            <br>
            <a class="button" href="scripts/cerrarSesion.php"><button><?php echo $lang["cerrarSesion"] ?></button></a>
        </div>
    <?php
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