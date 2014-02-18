<?php
// #####################  ELIMINA EL ALIMENTO   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//recogemos la variable id con la que identificamos el alimento a eliminar
$id = $_GET['id'];


//borramos
$peticion = mysql_query("DELETE FROM midieta WHERE id='".$id."'");

//cerrar conexion
mysql_close($conexion);


//redireccionamos a la pagina principal
include('redireccion.php');

?>