<?php 
// #####################  FORMULARIO PARA MODIFICAR EL ALIMENTO   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//Recuperar variables
$id = $_GET['id'];
$dieta = $_GET['dieta'];
$calorias = $_GET['calorias'];



echo "
<h1>Modificar dietas</h1>
<table border=1>
	<tr>
		<td>Nombre de la dieta</td>
		<td>Calorias</td>
		<td></td>
	</tr>
";

//realizo la peticion
$peticion = mysql_query("SELECT * FROM nom_dietas WHERE id='".$id."'");

//listo todos los elementos de la base de datos
while ($fila = mysql_fetch_array($peticion))
{
	echo 
	"
	<tr>
		<form action='updateDieta.php' method='POST'>
			<td><input type='text' name='dieta' value='".$fila['dieta']."' ></td>
			<td><input type='number' name='calorias' value='".$fila['calorias']."' ></td>
			<td><input type='submit'></td>
		</form>
	</tr>
	";
}

echo "</table>";

$_SESSION['id'] = $id;
$_SESSION['dieta'] = $dieta;
//cerrar conexion
mysql_close($conexion);

 ?>