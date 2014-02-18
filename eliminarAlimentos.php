<?php 
// #####################  BORRA TODOS LOS DATOS DE LA TABLA midieta   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//recogemos la variable dia y comida
$dia = $_GET['dia'];
$comida = $_GET['comida'];
$dieta = $_SESSION['dieta'];
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

//eliminamos todos los valores de la tabla
$peticion = mysql_query("DELETE FROM midieta WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND dia='".$dia."' AND comida='".$comida."' AND dieta='".$dieta."'");

//cerrar conexion
mysql_close($conexion);

//redireccionamos a la pagina principal
include('redireccion.php');

 ?>