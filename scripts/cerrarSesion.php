<?php
session_unset();
session_destroy();
setcookie("PHPSESSID", null, -1,'/');
 echo "<script type='text/javascript'> window.location.rel='index.php';</script>";
//header("Location: index.php");
?>