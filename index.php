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
    <?php
    if (!empty($_COOKIE['_cookietema'])) $style = $_COOKIE['_cookietema'];
    if (empty($_COOKIE['_cookietema'])) $style = "style";
    ?>
    <link rel="stylesheet" href="<?php echo $style ?>.css" type="text/css" media="all">

    <title><?php echo $lang['titulo'] ?></title>
</head>

<body>
    <!--Botones de idiomas-->
    <a href="index.php?lang=eng"><img src="media/flags/england.png" alt="<?= $lang['eng']; ?>" title="<?= $lang['eng']; ?>" class="eng" /></a>
    <a href="index.php?lang=esp"><img src="media/flags/espana.png" alt="<?= $lang['esp']; ?>" title="<?= $lang['esp']; ?>" class="esp" /></a>
    <!--Botones temas-->
    <div class="container-btn-mode" style="display: flex;">
        <a href="./scripts/funcioncookie.php?usertheme=./css/style"><img class="imgsol" src= "./media/tema/sol.png"></a>
        <a href="./scripts/funcioncookie.php?usertheme=./css/styleDarkMode"><img class="imgluna" src="./media/tema/luna.png"></a>
    </div>
    <?php
    //Cargamos las cookies. Caducan en 1 año
    if (!isset($_COOKIE["primeraVisita"])) {
        setcookie("primeraVisita", time(), time() + 60 * 60 * 24 * 365);
    }

    //Si ya tenemos la sesion iniciada nos manda a la pagina de las batallas
    if (isset($_SESSION["usuario"])) {
        header("Location: batallas.php");
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