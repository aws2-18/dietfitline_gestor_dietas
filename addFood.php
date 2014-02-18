<?php 
// #####################  AÑADE LOS VALORES DEL ALIMENTO SELECCIONADO   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

$alimento = $_POST['alimento'];
$gramos = $_POST['gramos'];
$dia = $_POST['dia'];
$comida = $_POST['comida'];

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];
$dieta = $_SESSION['dieta'];

//hacemos la consulta
$peticion = mysql_query("SELECT * FROM tabla_alimentos WHERE alimento='".$alimento."'");

//asigno a una variable al resultado
while ($fila = mysql_fetch_array($peticion))
{
	$calorias = $fila['calorias'];
	$lipidos = $fila['lipidos'];
	$carbohidratos = $fila['carbohidratos'];
	$proteinas = $fila['proteinas'];
}


//Asignamos los nuevos valores a las anteriores variables
$calorias = ($gramos*$calorias)/100;
$lipidos = ($gramos*$lipidos)/100;
$proteinas = ($gramos*$proteinas)/100;
$carbohidratos = ($gramos*$carbohidratos)/100;

//hacemos la peticion
mysql_query("INSERT INTO midieta (usuario, contrasena, dieta, dia, comida, alimento, gramos, calorias, carbohidratos, lipidos, proteinas) VALUES ('".$usuario."','".$contrasena."','".$dieta."','".$dia."','".$comida."','".$alimento."',".$gramos.",".$calorias.",".$carbohidratos.",".$lipidos.",".$proteinas.")");


//cerramos conexion
mysql_close($conexion);

//redireccionamos a la pagina principal
include('redireccion.php');

 ?>