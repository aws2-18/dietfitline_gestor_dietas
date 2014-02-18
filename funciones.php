<?php 

function todosAlimentos()
{
	//mostramos titulo
	echo "
	<h1>Todos los alimentos</h1>
	";

	//hago la peticion
	$peticion = mysql_query("SELECT * FROM tabla_alimentos");

	//listo todos los elementos de la base de datos como enlaces
	while ($fila = mysql_fetch_array($peticion))
	{
		echo 
		"
			<a href='addFoodForm.php?alimento=".$fila['alimento']."'>".$fila['alimento']."</a>
		";

	}
 
}


function contarRegistros()
{
	//mostrar dias diferentes
	echo "Mostrar todos los dias usados en midieta y los muestra sin repetir:<br>";
	$peticion = mysql_query("SELECT DISTINCT dia FROM midieta");
	
	while ($fila = mysql_fetch_array($peticion))
	{
		echo $fila['dia']."<br>";

	}

	//contar dias diferentes
	echo "Contamos los distintos dias que hay: ";
	$peticion = mysql_query("SELECT COUNT(DISTINCT dia) AS cantidad FROM midieta");

	while ($fila = mysql_fetch_array($peticion))
	{
		echo $fila['cantidad']."<br>";

	}
}



// Funcion que nos da los alimentos de la ingesta del dia que sea
function alimentosDia($dia,$comida)
{
	echo"
	<h3>".strtoupper($comida)."</h3> 
	<a href='copiarIngestaForm.php?dia=".$dia."&comida=".$comida."'>Copiar ingesta</a> 
	<a href='eliminarAlimentos.php?dia=".$dia."&comida=".$comida."'>Eliminar alimentos</a>
	<table border=1 width=100%>
		<tr>
			<td>Alimento</td>
			<td>Gramos</td>
			<td>Calorias</td>
			<td>Carbohidratos</td>
			<td>Lipidos</td>
			<td>Proteinas</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	";

	$peticion = mysql_query("SELECT * FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dia='".$dia."' AND comida='".$comida."' AND dieta='".$_SESSION['dieta']."'");
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
			<td>".$fila['alimento']."</td>
			<td>".$fila['gramos']."</td>
			<td>".$fila['calorias']."</td>
			<td>".$fila['carbohidratos']."</td>
			<td>".$fila['lipidos']."</td>
			<td>".$fila['proteinas']."</td>
			<td><a href='deleteFood.php?id=".$fila['id']."'>Eliminar</a></td>
			<td><a href='updateFoodForm.php?id=".$fila['id']."&alimento=".$fila['alimento']."&gramos=".$fila['gramos']."'>Modificar</a></td>
			<td><a href='copyFoodForm.php?id=".$fila['id']."&dia=".$dia."&comida=".$comida."&alimento=".$fila['alimento']."&gramos=".$fila['gramos']."'>Copiar</a></td>
		</tr>
		";

	}

	echo "</table>";
}



//funcion que calcula la media semanal del elemento que digamos
function calculoDiario($elemento,$dia,$unidad)
{
	//hacemos la suma del elemento seleccionado y lo asignamos al array $fila
	$peticion = mysql_query("SELECT SUM($elemento) as total FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dia='".$dia."' AND dieta='".$_SESSION['dieta']."'");
	$fila = mysql_fetch_array($peticion);

	//mostramos texto de la media que sera
	echo $elemento.": "; 

	//le asignamos un valor a $elemento
	$elemento = number_format($fila['total'], 2);
	
	//mostramos el valor asignado
	echo $elemento." ".$unidad."<br>";

}

function porcentajeDiario($dia)
{
	//hacemos la suma del elemento seleccionado y lo asignamos al array $fila
	$peticion = mysql_query("SELECT SUM(carbohidratos) as total FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dia='".$dia."' AND dieta='".$_SESSION['dieta']."'");
	$fila = mysql_fetch_array($peticion);

	$carbohidratos = number_format($fila['total'], 2);

	//hacemos la suma del elemento seleccionado y lo asignamos al array $fila
	$peticion = mysql_query("SELECT SUM(proteinas) as total FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dia='".$dia."' AND dieta='".$_SESSION['dieta']."'");
	$fila = mysql_fetch_array($peticion);

	$proteinas = number_format($fila['total'], 2);

	//hacemos la suma del elemento seleccionado y lo asignamos al array $fila
	$peticion = mysql_query("SELECT SUM(lipidos) as total FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dia='".$dia."' AND dieta='".$_SESSION['dieta']."'");
	$fila = mysql_fetch_array($peticion);

	$lipidos = number_format($fila['total'], 2);

	//calculamos calorias
	$calTotales = $proteinas*4 + $carbohidratos*4 + $lipidos*8.8;
	
	//acción dinámico específica de los alimentos
	$accionDinamicoEspecifica = ($proteinas*4)*1.30 + ($carbohidratos*4)*1.05 + ($lipidos*8.8)*1.14;

	//si no hemos puesto datos al dividir entre 0 nos da un warning, aqui no nos importa asi que ponemos @
	echo "Carbohidratos: ".@number_format(($carbohidratos*4*100/$calTotales), 2)." %<br>";
	echo "Proteinas: ".@number_format(($proteinas*4*100/$calTotales), 2)." %<br>";
	echo "Lipidos: ".@number_format(($lipidos*8.8*100/$calTotales), 2)." %<br>";
	echo "Calorias totales + Accion dinamico especifica de los alimentos: <br>".$calTotales." kcal + ".number_format(($accionDinamicoEspecifica-$calTotales), 2)." kcal = ".number_format($accionDinamicoEspecifica, 2)." kcal";

}

//funcion que hace los calculos para el sia elegido 
function mostrarDatosDia($dia){

	// sumar elementos de la base de datos
	$peticion = mysql_query("SELECT SUM(calorias) as total FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dia='".$dia."' AND dieta='".$_SESSION['dieta']."'");

	$fila = mysql_fetch_array($peticion);

	//echo "Calorias: ".$fila['total']."<br>";
	$calorias = $fila['total'];
	echo "Balance (+ = Pasas | - = Faltan): ".(-$_SESSION['calorias']+$calorias)."<br>";

	//calculoDiario("calorias",$dia);
	calculoDiario("lipidos",$dia,"gr");
	calculoDiario("carbohidratos",$dia,"gr");
	calculoDiario("proteinas",$dia,"gr");

	porcentajeDiario($dia);
}

/* 
	Funcion para mostrar todas las ingestas y calculos del dia que queramos
	Coge la funcion alimentosDia() y la funcion calculosDia() para darnos 
	todas las ingestas mas el calculo del dia deseado
*/
function mostrarTodo($dia)
{
	//Titulo del dia
	echo "<h2>".strtoupper($dia)."</h2>
	<a href='copiarDiaForm.php?dia=".$dia."'>Copiar dia</a>
	<a href='vaciarDia.php?dia=".$dia."'>Vaciar dia</a>";
	//Alimentos del dia entero
	alimentosDia($dia, 'desayuno');
	alimentosDia($dia, 'mediamanana');
	alimentosDia($dia, 'almuerzo');
	alimentosDia($dia, 'merienda');
	alimentosDia($dia, 'cena');
	alimentosDia($dia, 'recena');
	//Calculo del dia entero
	mostrarDatosDia($dia);
}

//funcion que calcula la media semanal del elemento que digamos
function calculoSemanal($elemento,$unidad)
{
	//hacemos la suma del elemento seleccionado y lo asignamos al array $fila
	$peticion = mysql_query("SELECT SUM($elemento) as total FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dieta='".$_SESSION['dieta']."'");
	$fila = mysql_fetch_array($peticion);

	//mostramos texto de la media que sera
	echo "Media ".$elemento.": "; 

	//le asignamos un valor a $elemento
	$elemento = number_format($fila['total']/7, 2);
	
	//mostramos el valor asignado
	echo $elemento." ".$unidad."<br>";

}

function porcentajeSemanal()
{
	//Calculamos porcentajes
//hacemos la suma del elemento seleccionado y lo asignamos al array $fila
$peticion = mysql_query("SELECT SUM(carbohidratos) as total FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dieta='".$_SESSION['dieta']."'");
$fila = mysql_fetch_array($peticion);

$carbohidratos = number_format($fila['total']/7, 2);

//hacemos la suma del elemento seleccionado y lo asignamos al array $fila
$peticion = mysql_query("SELECT SUM(proteinas) as total FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dieta='".$_SESSION['dieta']."'");
$fila = mysql_fetch_array($peticion);

$proteinas = number_format($fila['total']/7, 2);

//hacemos la suma del elemento seleccionado y lo asignamos al array $fila
$peticion = mysql_query("SELECT SUM(lipidos) as total FROM midieta WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND dieta='".$_SESSION['dieta']."'");
$fila = mysql_fetch_array($peticion);

$lipidos = number_format($fila['total']/7, 2);

//calculamos calorias
$calTotales = $proteinas*4 + $carbohidratos*4 + $lipidos*8.8;

//si no hemos puesto datos al dividir entre 0 nos da un warning, aqui no nos importa asi que ponemos @
echo "Carbohidratos: ".@number_format(($carbohidratos*4*100/$calTotales), 2)." %<br>";
echo "Proteinas: ".@number_format(($proteinas*4*100/$calTotales), 2)." %<br>";
echo "Lipidos: ".@number_format(($lipidos*8.8*100/$calTotales), 2)." %<br>";
}


 ?>