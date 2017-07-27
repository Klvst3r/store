<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index Admin</title>
</head>
<body>
	<h1>Estás adentro</h1>

<?php
//session_start();
/*session_destroy();
 session_unset();*/
//Validación
if(isset($_SESSION["usuario"])){
	//echo "Usuario: " . $_SESSION["usuario"] . "<br/>";
	/*echo "E-mail: " . $_SESSION["email"] . "<br/>";
	echo "Privilegio: " . $_SESSION["privilegio"] . "<br/>";*/




}else{
	redireccionar("/login"); 
}

?>
</body>
</html>
