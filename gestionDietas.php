<?php 
// #####################  AÑADE DIETAS   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//recogemos variables
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
//mostramos titulo
echo "<h1>Estas son tus dietas</h1>";

//mostramos datos de la persona
echo "usuario: ".$_SESSION['usuario']."<br>";
echo "contrasena: ".$_SESSION['contrasena']."<br>";
echo "<a href='unlog.php'>Cerrar sesion</a><br>";
//creamos la tabla
echo "
<table border='1px'>
	<tr>
		<td>Nombre de la dieta</td>
		<td>Calorias</td>
		<td></td>
		<td></td>
	</tr>
";

//hago la peticion
$peticion = mysql_query("SELECT * FROM nom_dietas WHERE usuario='".$usuario."' AND contrasena='".$contrasena."'");

//listo todos los elementos de la base de datos como enlaces
while ($fila = mysql_fetch_array($peticion))
{
	echo "
	<tr>
		<td><a href='principal.php?dieta=".$fila['dieta']."&calorias=".$fila['calorias']."'>".$fila['dieta']."</a></td>
		<td>".$fila['calorias']."</td>
		<td><a href='updateDietaForm.php?id=".$fila['id']."&dieta=".$fila['dieta']."&calorias=".$fila['calorias']."'>Modificar</a></td>
		<td><a href='deleteDieta.php?id=".$fila['id']."&dieta=".$fila['dieta']."'>Eliminar</a></td>
	</tr>
	";
}

echo "
	<tr>
		<form method='post' action='addDieta.php'>
			<td><input type='text' name='dieta'></td>
			<td><input type='number' name='calorias'></td>
			<td><input type='submit' value='Crear dieta'></td>
			<td></td>
		</form>
	</tr>
</table>
	";

//cerramos la conexion
mysql_close($conexion);

 ?>