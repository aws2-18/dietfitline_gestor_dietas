<?php 
// #####################  AÑADE DIETAS   ###########################

//empezamos la sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//recogemos las vaiables
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
$dieta = $_POST['dieta'];
$calorias = $_POST['calorias'];

//hacemos las peticiones
mysql_query("INSERT INTO nom_dietas (usuario, contrasena, dieta, calorias) VALUES ('".$usuario."','".$contrasena."','".$dieta."',".$calorias.")");

//cerramos la conexion
mysql_close($conexion);

//redireccionamos
echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=gestionDietas.php">
	</head>
</html>
';

 ?>