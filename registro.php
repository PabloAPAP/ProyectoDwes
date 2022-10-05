<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post" enctype="multipart/form-data">


    Suba una imagen de avatar:
      <input type="file" id="avatar" name="imagenAvatar"/><br />
      <input type="submit" value="Enviar" name="submit"/>
</form>
</body>
</html>