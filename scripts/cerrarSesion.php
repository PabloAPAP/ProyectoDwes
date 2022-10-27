<?php
if (!isset($_SESSION["usuario"])) {
    session_start();
}
session_unset();
session_destroy();
setcookie("PHPSESSID", null, -1,'/');
header("Location: ./../index.php");
?>