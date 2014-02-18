<?php

// empezamos sesion, configuramos conexion, seleccionamos base de datos
include('conexion.php');

$codigo = $_SESSION['permisos'];

//super if
if ($codigo == 1) 
{
	echo "Usuario:".$_SESSION['usuario']."<br>";
	echo "Usuario:".$_SESSION['contrasena']."<br>";

	echo"
		<h1>Gestion de usuarios</h1> 

		<table border=1 width=100%>
			<tr>
				<td>Usuario</td>
				<td>Contraseña</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Edad</td>
				<td>Permisos</td>
				<td></td>
				<td></td>
			</tr>
		";

		$peticion = mysql_query("SELECT * FROM usuarios");

		if($peticion === FALSE) 
		{
	    	die(mysql_error()); // TODO: better error handling
		}
		//listo todos los elementos de la base de datos
		while ($fila = mysql_fetch_array($peticion))
		{
			echo 
			"
			<tr>
				<td>".$fila['usuario']."</td>
				<td>".$fila['contrasena']."</td>
				<td>".$fila['nombre']."</td>
				<td>".$fila['apellido']."</td>
				<td>".$fila['edad']."</td>
				<td>".$fila['permisos']."</td>
				<td><a href='deleteUsuario.php?usuario=".$fila['usuario']."&contrasena=".$fila['contrasena']."&nombre=".$fila['nombre']."&apellido=".$fila['apellido']."&edad=".$fila['edad']."&permisos=".$fila['permisos']."'>Eliminar</a></td>
				<td><a href='updateUsuarioForm.php?usuario=".$fila['usuario']."&contrasena=".$fila['contrasena']."&nombre=".$fila['nombre']."&apellido=".$fila['apellido']."&edad=".$fila['edad']."&permisos=".$fila['permisos']."'>Modificar</a></td>
			</tr>
			";

		}

		echo "
		<tr>
			<form action='crearusuariodesdegestion.php' method='post'>
			<td><input type='text' name='usuario'></td>
			<td><input type='text' name='contrasena'></td>
			<td><input type='text' name='nombre'></td>
			<td><input type='text' name='apellido'></td>
			<td><input type='number' name='edad'></td>
			<td><input type='number' name='permisos'></td>
			<td><input type='submit'></td>
			<td></td>
			<form>
		</tr>";
		echo "</table>";

	//cerramos la conexion
	mysql_close($conexion);

//fin del super if
}
else
{
	echo "Tu no eres administrador.";
}

?>