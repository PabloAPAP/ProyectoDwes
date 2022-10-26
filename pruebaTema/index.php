<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<?php
	if (!empty($_COOKIE['_cookietema'])) $style = $_COOKIE['_cookietema'];
	if (empty($_COOKIE['_cookietema'])) $style = "style";
	?>
	<link rel="stylesheet" href="<?php echo $style ?>.css" type="text/css" media="all">
</head>

<body>
	<a href="funcioncookie.php?usertheme=style"><img src="Anochecer32.ico"></a>
	<a href="funcioncookie.php?usertheme=style2">ESTILO 2</a>
</body>

</html>