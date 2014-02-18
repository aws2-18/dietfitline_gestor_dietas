<?php 
// empezamos sesion, configuramos conexion, seleccionamos base de datos
include('conexion.php');

$dieta = $_SESSION['dieta'];
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

//funcion que nos muestra el alimento y sus gramos del dia y la ingesta k decidamos
function alimentosDia($dia,$comida)
{
	GLOBAL $dieta, $usuario, $contrasena;
	//realizamos la peticion
	$peticion = mysql_query("SELECT * FROM midieta WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND dia='".$dia."' AND comida='".$comida."' AND dieta='".$dieta."'");
	
	//alineamos columna arriba a la izquierda
	echo "<td align='left' valign='top'>";
	//listo todos los elementos de la base de datos
	while ($fila = mysql_fetch_array($peticion))
	{
		echo "- ".$fila['alimento']." <i>(".$fila['gramos']." gr)</i></br>";
	}
	//cerramos la columna
	echo "</td>";
}

//EMPEZAMOS A MOSTRAR LOS DATOS
echo"
 <html>
 	<head>
 		<title>Datos dieta</title>
 	</head>
 	<body>
	<style type='text/css'>
		table 
		{
			border-collapse: collapse;
			border-spacing: 0;
		}

		#hor-minimalist-a 
		{
			font-family: 'Lucida Sans Unicode', 'Lucida Grande', Sans-Serif;
			font-size: 12px;
			width: 100%;
			height:100%;
			color: #039;
			transition: background-color 2s;
		}

		#hor-minimalist-a th 
		{
			font-size: 14px;
			font-weight: normal;
			border-bottom: 2px solid #6678b1;
			padding: 10px 8px;
		}

		#hor-minimalist-a td 
		{
			vertical-align:top;
			padding:5px;
		}

		#hor-minimalist-a tr
		{
			background-color: white;
			transition:background-color 0.3s ;
		}

		#hor-minimalist-a tr:hover
		{
			background-color: #e0fdff;
		}

		i
		{
			color:#e2b044;
		}
	</style>

	<table id='hor-minimalist-a'>
	<thead>
		<tr>
			<td colspan='8' align='center'>DIETA: ".$_SESSION['dieta']." - ".$_SESSION['calorias']." kcal</td>
		</tr>
		<tr>
			<th></th>
			<th align='center'>LUNES</th>
			<th align='center'>MARTES</th>
			<th align='center'>MIERCOLES</th>
			<th align='center'>JUEVES</th>
			<th align='center'>VIERNES</th>
			<th align='center'>SABADO</th>
			<th align='center'>DOMINGO</th>
		</tr>
	</thead>
	<tbody>
	";

//funcion que coge la funcion anterior para mostrar fila completa
function imprimeDieta($comida)
{
	echo "
		<tr>
			<td align='center'>".strtoupper($comida)."</td>";
			alimentosDia('lunes',$comida);
			alimentosDia('martes',$comida);
			alimentosDia('miercoles',$comida);
			alimentosDia('jueves',$comida);
			alimentosDia('viernes',$comida);
			alimentosDia('sabado',$comida);
			alimentosDia('domingo',$comida);
	echo "</tr>";
}

//mostramos todas las filas
imprimeDieta('desayuno');
imprimeDieta('mediamanana');
imprimeDieta('almuerzo');
imprimeDieta('merienda');
imprimeDieta('cena');
imprimeDieta('recena');
//cerramos la tabla
echo "
</tbody>
</table>
 </html>";

//cerramos la conexion
mysql_close($conexion);

 ?>

