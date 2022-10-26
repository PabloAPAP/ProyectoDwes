<?php 
require "confIdioma.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $lang['titulo']?></title>
    <?php include './Utilidades/botonDiaNoche.php'; ?>
    <?php include './Utilidades/links.php'; ?>
</head>
<body id="page" class="wrapper">
    <?php
    //Cargamos las cookies
    if (!isset($_COOKIE["primeraVisita"])) {
        //La cookie caduca en 1 año. La vamos a utilizar después para guardar las preferencias de tema e idioma.
        setcookie("primeraVisita", time(), time() + 60 * 60 * 24 * 365);
    }
    //Abrimos la sesion
    session_start();

    ?>
    <a href="index.php?lang=eng" ><img src="media/flags/england.png" alt="<?=$lang['eng'];?>" title="<?=$lang['eng'];?>" class="eng"/></a>
    <a href="index.php?lang=esp" ><img src="media/flags/espana.png" alt="<?=$lang['esp'];?>" title="<?=$lang['esp'];?>" class="esp" /></a>

    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" class="login-form">
        <button onclick="window.open('login.php')"><?php echo $lang['login']?></button>
        <button onclick="window.open('registro.php')"><?php echo $lang['registro']?></button>    
</form>
</body>
</html>