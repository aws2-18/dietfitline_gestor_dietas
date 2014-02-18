<?php

// #####################  MODIFICAR EL USUARIO  ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//recogemos variables

$usuarioantiguo = $_SESSION['usuario'];

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$permisos = $_POST['permisos'];

//actualizamos el usuario
mysql_query("UPDATE usuarios SET usuario='".$usuario."', contrasena='".$contrasena."', nombre='".$nombre."', apellido='".$apellido."', edad='".$edad."', permisos='".$permisos."' WHERE usuario ='".$usuarioantiguo."'");

//cerrar conexion
mysql_close($conexion);

//redirección
echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=gestionusuarios.php">
	</head>
</html>
';

?>