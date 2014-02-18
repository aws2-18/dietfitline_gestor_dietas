<?php 
// #####################  EMPEZAMOS LA SESION, LA CONEXION Y SELECCIONA BASE DE DATOS   ###########################

//comenzamos sesion
session_start();

//configuramos la conexion
$conexion = mysql_connect("mysql1.000webhost.com","a5970070_ander","1-a-2-b-3-c-4-d");

//si no se puede realizar la conexion avisamos del error
if (!$conexion) 
{
	die('No he podido conectar por la siguiente razon: '.mysql_error());
}

//selecciono la base de datos
mysql_select_db("a5970070_dieta",$conexion);

 ?>