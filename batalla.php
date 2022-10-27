<?php
require "confIdioma.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang["batalla"] ?></title>
</head>

<body>
    <?php
    if (!isset($_SESSION["usuario"])) {
        session_start();
    }

    $nombreUsuario = $_SESSION['usuario'];
    ?>
    <header>
        <p><?php echo $lang["saludo"] . " " . $nombreUsuario; ?></p>
        <a href="scripts/cerrarSesion.php"><button><?php echo $lang["cerrarSesion"] ?></button></a>
    </header>
</body>

</html>