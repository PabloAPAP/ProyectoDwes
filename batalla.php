<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batalla de productos</title>
</head>

<body>
    <?php
    $nombreUsuario = $_SESSION['usuario'];
    ?>
    <header>
        <p><?php echo $nombreUsuario; ?></p>
        <a href="scripts/cerrarSesion.php"><button>Cerrar sesion</button></a>
    </header>
</body>

</html>