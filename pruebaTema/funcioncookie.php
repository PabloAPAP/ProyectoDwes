<?php
	$tema=$_GET['usertheme'];
	setcookie('_cookietema',$tema,time()+(86400*30),"/","");
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>