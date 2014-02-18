<?php

// #####################  FORMULARIO PARA MODIFICAR EL USUARIO   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//Recuperar variables
$usuario = $_GET['usuario'];
$contrasena = $_GET['contrasena'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$edad = $_GET['edad'];
$permisos = $_GET['permisos'];


echo "
<h1>Modificar usuario</h1>
<table border=1>
	<tr>
		<td>Usuario</td>
		<td>Contraseña</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Edad</td>
		<td>Permisos</td>
		<td></td>
	</tr>
";

//realizo la peticion
$peticion = mysql_query("SELECT * FROM usuarios WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND nombre='".$nombre."' AND apellido='".$apellido."' AND edad='".$edad."' AND permisos='".$permisos."'");

//listo todos los elementos de la base de datos
while ($fila = mysql_fetch_array($peticion))
{
	echo 
	"
	<tr>
		<form action='updateusuario.php' method='POST'>
			<td><input type='text' name='usuario' value='".$fila['usuario']."' ></td>
			<td><input type='text' name='contrasena' value='".$fila['contrasena']."' ></td>
			<td><input type='text' name='nombre' value='".$fila['nombre']."' ></td>
			<td><input type='text' name='apellido' value='".$fila['apellido']."' ></td>
			<td><input type='number' name='edad' value='".$fila['edad']."' ></td>
			<td><input type='number' name='permisos' value='".$fila['permisos']."' ></td>
			<td><input type='submit'></td>
		</form>
	</tr>
	";
}

echo "</table>";

$_SESSION['usuario'] = $usuario;

//cerrar conexion
mysql_close($conexion);


?>