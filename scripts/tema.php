<?php
	$tema=$_GET['usertheme'];
	setcookie('tema',$tema,time()+(86400*30),"/","");
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>