<?php 
// #####################  FORMULARIO PARA SELECCIONAR DONDE COPIAR LA INGESTA   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//Recuperar variables
$dia = $_GET['dia'];

// $pedirlista = mysql_query("SELECT * FROM alimentos WHERE Alimento='".$alimento."'");

echo "
<h1>Copiar ".$dia."</h1>
<table border=1 width=100%>
	<form action='copiarDia.php' method='POST'>
		<tr>
			<td></td>
			<td>Lunes</td>
			<td>Martes</td>
			<td>Miercoles</td>
			<td>Jueves</td>
			<td>Viernes</td>
			<td>Sabado</td>
			<td>Domingo</td>
			<td></td>
		</tr>
		<tr>
			<td>Copiar a</td>
			<td><input type='checkbox' name='lunes'></td>
			<td><input type='checkbox' name='martes'></td>
			<td><input type='checkbox' name='miercoles'></td>
			<td><input type='checkbox' name='jueves'></td>
			<td><input type='checkbox' name='viernes'></td>
			<td><input type='checkbox' name='sabado'></td>
			<td><input type='checkbox' name='domingo'></td>
			<td><input type='submit'></td>
		</tr>
		
	</form>
</table>
";

$_SESSION['dia'] = $dia;


//cerrar conexion
mysql_close($conexion);


 ?>