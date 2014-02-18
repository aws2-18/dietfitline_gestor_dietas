<?php

session_start();

// #####################  REDIRECCIONA AL FORMULARIO DE LOGIN   ###########################

if (isset($_SESSION['usuario'])) 
{
	echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=gestionDietas.php">
		</head>
	</html>
	';
}
else
{
	echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=formulariologin.php">
		</head>
	</html>
	';
}



?>