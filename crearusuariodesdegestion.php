<?php

// empezamos sesion, configuramos conexion, seleccionamos base de datos
include('conexion.php');

$contador = 0;

//recogemos datos del formulario en variables
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$permisos = $_POST['permisos'];

//comprobamos si existe el usuario y si existe le añadimos un 1 al contador
$peticion = mysql_query("SELECT * FROM usuarios");

while ($fila = mysql_fetch_array($peticion))
{
	if ($fila['usuario'] == $usuario) 
	{
		$contador++;
	}
	else
	{}
}

if ($contador == 0) 
{
	//los permisos los asignamos nosotros directamente
	mysql_query("INSERT INTO usuarios (usuario, contrasena, nombre, apellido, edad, permisos) VALUES ('".$usuario."','".$contrasena."','".$nombre."','".$apellido."','".$edad."','".$permisos."')");

	//cerramos la conexion
	mysql_close();

	echo'
	<html>
		<head>
			<meta http-equiv="REFRESH" content="0;url=gestionusuarios.php">
		</head>
	</html>
	';
}
else
{
	echo "El nombre de usuario que has elegido ya existe elige otro.";
	//cerramos la conexion
	mysql_close();
}

?>