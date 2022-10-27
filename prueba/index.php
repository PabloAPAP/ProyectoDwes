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
	<a href="funcioncookie.php?usertheme=./css/style"><img src="./media/Anochecer32.ico"></a>
	<a href="funcioncookie.php?usertheme=./css/styleDarkMode"><img src="./media/Amanecer.png" width="32px" height="32px"></a>
</body>

</html>