<?php

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//obtenemos variables
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

//consulta
$peticion = mysql_query("SELECT * FROM usuarios");

//lanzar consulta
while ($fila = mysql_fetch_array($peticion))
{
	$usuariobasedatos = $fila['usuario'];
	$contrasenabasedatos = $fila['contrasena'];
	$permisosenbase = $fila['permisos'];

	if ($usuario == $usuariobasedatos && $contrasena == $contrasenabasedatos) 
	{
		//si el resultado es positivo entonces asignar
		$_SESSION['usuario'] = $usuario;
		$_SESSION['contrasena'] = $contrasena;
		$_SESSION['permisos'] = $permisosenbase;

		echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="0;url=gestionDietas.php">
			</head>
		</html>
		';
	}
	else{}
}


?>