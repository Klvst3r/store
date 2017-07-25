<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index Admin</title>
</head>
<body>
	<h1>Estas adentro</h1>

<?php
//session_start();

echo "Usuario: " . $_SESSION["usuario"] . "<br/>";
echo "E-mail: " . $_SESSION["email"] . "<br/>";
echo "Privilegio: " . $_SESSION["privilegio"] . "<br/>";

?>
</body>
</html>
