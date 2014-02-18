<?php
// #####################  MODIFICA EL ALIMENTO EN LA TABLA   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

$alimento = $_POST['alimento'];
$gramos = $_POST['gramos'];
$dia = $_POST['dia'];
$comida = $_POST['comida'];

$idAlimento = $_SESSION['id'];



//hacemos la consulta
$peticion = mysql_query("SELECT * FROM tabla_alimentos WHERE alimento='".$alimento."'");

//asigno a una variable el resultado
while ($fila = mysql_fetch_array($peticion))
{
	$calorias = $fila['calorias'];
	$lipidos = $fila['lipidos'];
	$carbohidratos = $fila['carbohidratos'];
	$proteinas = $fila['proteinas'];
}



//Regla de 3 para sacar los valores por gramo
$calorias = ($gramos*$calorias)/100;
$lipidos = ($gramos*$lipidos)/100;
$proteinas = ($gramos*$proteinas)/100;
$carbohidratos = ($gramos*$carbohidratos)/100;



//hacemos la peticion
mysql_query("UPDATE midieta SET dia='".$dia."', comida='".$comida."', gramos='".$gramos."', calorias ='".$calorias."', carbohidratos ='".$carbohidratos."', lipidos ='".$lipidos."', proteinas ='".$proteinas."' WHERE id ='".$idAlimento."'");


//cerramos conexion
mysql_close($conexion);

//redireccionamos a la pagina principal
include('redireccion.php');

?>