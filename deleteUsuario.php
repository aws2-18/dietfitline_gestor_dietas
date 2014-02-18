<?php
// #####################  BORRA USUARIO   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//recogemos la variable dia y comida
$usuario = $_GET['usuario'];
$contrasena = $_GET['contrasena'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$edad = $_GET['edad'];
$permisos = $_GET['permisos'];

//eliminamos todos los valores de la tabla
$peticion = mysql_query("DELETE FROM usuarios WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND nombre='".$nombre."' AND apellido='".$apellido."' AND edad='".$edad."' AND permisos='".$permisos."'");
//cerrar conexion
mysql_close($conexion);

//redireccionamos
echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=gestionusuarios.php">
	</head>
</html>
';

 ?>