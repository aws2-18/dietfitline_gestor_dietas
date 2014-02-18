<?php 
// #####################  FORMULARIO PARA AÑADIR UN NUEVO ALIMENTO   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//Recuperar variables
$alimento = $_GET['alimento'];



echo "
<h1>Poner alimentos</h1>
<table border=1 width=100%>
	<tr>
		<td>Alimento</td>
		<td>Gramos</td>
		<td>Dia</td>
		<td>Comida</td>
		<td></td>
	</tr>
";




//realizo la peticion
$peticion = mysql_query("SELECT * FROM tabla_alimentos WHERE alimento='".$alimento."'");


//listo todos los elementos de la base de datos
while ($fila = mysql_fetch_array($peticion))
{
	echo 
	"
	<tr>
		<form action='addFood.php' method='POST'>
			<td><input type='text' name='alimento' value='".$fila['alimento']."' readonly></td>
			<td><input type='number' name='gramos' ></td>
			<td>
				<select name='dia'>
					<option value='lunes'>Lunes</option>
					<option value='martes'>Martes</option>
					<option value='miercoles'>Miercoles</option>
					<option value='jueves'>Jueves</option>
					<option value='viernes'>Viernes</option>
					<option value='sabado'>Sabado</option>
					<option value='domingo'>Domingo</option>
				</select>
			</td>
			<td>
				<select name='comida'>
					<option value='desayuno'>Desayuno</option>
					<option value='mediamanana'>Media mañana</option>
					<option value='almuerzo'>Almuerzo</option>
					<option value='merienda'>Merienda</option>
					<option value='cena'>Cena</option>
					<option value='recena'>Recena</option>
				</select>
			</td>
			<td><input type='submit'></td>
		</form>
	</tr>
	";

}

echo "</table>";

//cerrar conexion
mysql_close($conexion);

 ?>