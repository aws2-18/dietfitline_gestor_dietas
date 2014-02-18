<?php 
// #####################  FORMULARIO PARA SELECCIONAR DONDE COPIAR LA INGESTA   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//Recuperar variables
$dia = $_GET['dia'];
$comida = $_GET['comida'];

// $pedirlista = mysql_query("SELECT * FROM alimentos WHERE Alimento='".$alimento."'");

echo "
<h1>Copiar ".$comida." del ".$dia."</h1>
<table border=1 width=100%>
	<form action='copiarIngesta.php' method='POST'>
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
			<td>Desayuno</td>
			<td><input type='checkbox' name='lunesDesayuno'></td>
			<td><input type='checkbox' name='martesDesayuno'></td>
			<td><input type='checkbox' name='miercolesDesayuno'></td>
			<td><input type='checkbox' name='juevesDesayuno'></td>
			<td><input type='checkbox' name='viernesDesayuno'></td>
			<td><input type='checkbox' name='sabadoDesayuno'></td>
			<td><input type='checkbox' name='domingoDesayuno'></td>
			<td></td>
		</tr>
		<tr>
			<td>Media mañana</td>
			<td><input type='checkbox' name='lunesMediamanana'></td>
			<td><input type='checkbox' name='martesMediamanana'></td>
			<td><input type='checkbox' name='miercolesMediamanana'></td>
			<td><input type='checkbox' name='juevesMediamanana'></td>
			<td><input type='checkbox' name='viernesMediamanana'></td>
			<td><input type='checkbox' name='sabadoMediamanana'></td>
			<td><input type='checkbox' name='domingoMediamanana'></td>
			<td></td>
		</tr>
		<tr>
			<td>Almuerzo</td>
			<td><input type='checkbox' name='lunesAlmuerzo'></td>
			<td><input type='checkbox' name='martesAlmuerzo'></td>
			<td><input type='checkbox' name='miercolesAlmuerzo'></td>
			<td><input type='checkbox' name='juevesAlmuerzo'></td>
			<td><input type='checkbox' name='viernesAlmuerzo'></td>
			<td><input type='checkbox' name='sabadoAlmuerzo'></td>
			<td><input type='checkbox' name='domingoAlmuerzo'></td>
			<td></td>
		</tr>
		<tr>
			<td>Merienda</td>
			<td><input type='checkbox' name='lunesMerienda'></td>
			<td><input type='checkbox' name='martesMerienda'></td>
			<td><input type='checkbox' name='miercolesMerienda'></td>
			<td><input type='checkbox' name='juevesMerienda'></td>
			<td><input type='checkbox' name='viernesMerienda'></td>
			<td><input type='checkbox' name='sabadoMerienda'></td>
			<td><input type='checkbox' name='domingoMerienda'></td>
			<td></td>
		</tr>
		<tr>
			<td>Cena</td>
			<td><input type='checkbox' name='lunesCena'></td>
			<td><input type='checkbox' name='martesCena'></td>
			<td><input type='checkbox' name='miercolesCena'></td>
			<td><input type='checkbox' name='juevesCena'></td>
			<td><input type='checkbox' name='viernesCena'></td>
			<td><input type='checkbox' name='sabadoCena'></td>
			<td><input type='checkbox' name='domingoCena'></td>
			<td></td>
		</tr>
		<tr>
			<td>Recena</td>
			<td><input type='checkbox' name='lunesRecena'></td>
			<td><input type='checkbox' name='martesRecena'></td>
			<td><input type='checkbox' name='miercolesRecena'></td>
			<td><input type='checkbox' name='juevesRecena'></td>
			<td><input type='checkbox' name='viernesRecena'></td>
			<td><input type='checkbox' name='sabadoRecena'></td>
			<td><input type='checkbox' name='domingoRecena'></td>
			<td><input type='submit'></td>
		</tr>
	</form>
</table>
";

$_SESSION['dia'] = $dia;
$_SESSION['comida'] = $comida;


//cerrar conexion
mysql_close($conexion);


 ?>