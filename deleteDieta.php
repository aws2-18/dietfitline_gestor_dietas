<?php 
// #####################  BORRA TODOS LOS DATOS DE LA TABLA midieta   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//recogemos la variable dia y comida
$id = $_GET['id'];

//eliminamos todos los valores de la tabla
$peticion = mysql_query("DELETE FROM nom_dietas WHERE id='".$id."'");
$peticion = mysql_query("DELETE FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dieta='".$_SESSION['dieta']."'");
//cerrar conexion
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