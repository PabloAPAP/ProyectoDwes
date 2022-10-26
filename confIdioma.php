<!-- Archivo de configuración multiidioma -->
<?php
/*Se realiza una instrucción if donde, si se ha solicitado $_GET['lang'],
la agrega y vuelve a cargar la página*/
if (isset($_GET['lang'])) {
    $_SESSION["lang"] = $_GET['lang'];
    header('Location:' . $_SERVER['PHP_SELF']);
    exit();
}
if (isset($_SESSION["lang"])) {
    /*Switch que mira la Sesion y depende del caso que sea elige un archivo de idioma,
en caso de que no haya ninguno, coge el español por defecto*/
    switch ($_SESSION["lang"]) {
        case "eng":
            require('lang/en.php');
            break;
        case "esp":
            require('lang/es.php');
            break;
        default:
            require('lang/es.php');
    }
} else {
    require('lang/es.php');
}
?>