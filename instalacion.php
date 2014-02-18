<?php 
// #####################  CREACION BASE DE DATOS Y DE TABLAS   ###########################

//Creo la conexion -> servidor, usuario, contraseña
$conexion = mysql_connect("mysql1.000webhost.com","a5970070_ander","1-a-2-b-3-c-4-d");


//si no se puede realizar la conexion
if (!$conexion) 
{
	die('No he podido conectar: '.mysql_error());
}


//selecciono la base de datos
mysql_select_db("a5970070_dieta",$conexion); //nombre,conexion

//########################################################################################

//CREACION DE LA TABLA DE LOS ALIMENTOS DE CADA DIETA DE USUARIOS
//creo la tabla midieta, donde pondre mis alimentos
$sql = "CREATE TABLE midieta
(
	id int NOT NULL AUTO_INCREMENT,
	usuario varchar(40),
	contrasena varchar(40),
	dieta varchar(100),
	dia varchar(20),
	comida varchar(20),
	alimento varchar(100),
	gramos int,
	calorias int,
	carbohidratos int,
	lipidos int,
	proteinas int,
	PRIMARY KEY (id)
)";
//Ejecuto peticion
mysql_query($sql,$conexion);

//########################################################################################

//CREACION DE LA TABLA DE DESCRIPCION DE DIETAS
$sql = "CREATE TABLE nom_dietas
(
	id int NOT NULL AUTO_INCREMENT,
	usuario varchar(40),
	contrasena varchar(40),
	dieta varchar(100),
	calorias int,
	PRIMARY KEY (id)
	/*
	de momento solo muestro esos valores quizas mas adelante quiera mostrar estos de qui abajo
	carbohidratos int,
	lipidos int,
	proteinas int
	*/
)";
//Ejecuto peticion
mysql_query($sql,$conexion);

//########################################################################################

//CREACION DE LA TABLA DE USUARIOS
//Ejecuto peticion
mysql_query($sql,$conexion);

$sql = "CREATE TABLE usuarios
(
	usuario varchar(40) NOT NULL,
	contrasena varchar(40) NOT NULL,
	nombre varchar(40) NOT NULL,
	apellido varchar(40) NOT NULL,
	edad int,
	permisos int
)";
//Ejecuto peticion
mysql_query($sql,$conexion);

//metemos un usuario de prueba
mysql_query("INSERT INTO usuarios (usuario, contrasena, nombre, apellido, edad, permisos) VALUES ('anderraso','1a2b3c4d','Ander','Raso','21',1)");

//########################################################################################

//cerramos la conexion
mysql_close($conexion);


/*

PASOS A SEGUIR

Privilegios - crear ususario video2brain video2brain localhost

importar, nombre tabla_alimentos, id primary key


*/
 ?>