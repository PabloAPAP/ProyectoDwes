<?php 
session_start();
if(isset($_GET['lang'])){
$_SESSION['lang'] = $_GET['lang'];
header('Location:'.$_SERVER['PHP_SELF']);
exit();
}
if(isset($_SESSION['lang']))
{
switch($_SESSION['lang']){
case "eng":
require('lang/en.php'); 
break; 
case "esp":
require('lang/es.php'); 
break; 
default: 
require('lang/es.php'); 
}
}else{
require('lang/es.php');
}
?>