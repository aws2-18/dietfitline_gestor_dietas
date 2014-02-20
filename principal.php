<?php 
// #######################################################################################################
// #####################  PANTALLA PRINCIPAL - CREADOR DE DIETA Y VALORACION   ###########################

// empezamos sesion, configuramos conexion, seleccionamos base de datos
include('conexion.php');

// preparamos las funciones
include('funciones.php');

$_SESSION['dieta'] = $_GET['dieta'];
$_SESSION['calorias'] = $_GET['calorias'];

echo "usuario: ".$_SESSION['usuario']."<br>";
echo "contrasena: ".$_SESSION['contrasena']."<br>";
echo "<a href='unlog.php'>Cerrar sesion</a><br>";
echo "
<html>
	<head>
		<title>".$_SESSION['dieta']." ".$_SESSION['calorias']." kcal</title>
	</head>
</html>

<a href='gestionDietas.php'>Gestionar dietas</a>
<p>Para buscar alimentos usar CONTROL + F</p>
";


// mostramos todos los alimentos en forma de enlace
todosAlimentos();

// mostramos titulo de la dieta
echo "<h1> DIETA: ".$_SESSION['dieta']." - ".$_SESSION['calorias']." kcal</h1>";
echo "<a href=dameDatos.php>Imprimir dieta</a> ";
//lleva a un archivo donde se podra vaciar la tabla de alimentos
echo "<a href='vaciarTabla.php'>Vaciar Tabla</a>";

// mostramos las ingestas diarias deseadas
mostrarTodo('lunes');
mostrarTodo('martes');
mostrarTodo('miercoles');
mostrarTodo('jueves');
mostrarTodo('viernes');
mostrarTodo('sabado');
mostrarTodo('domingo');

// Calculamos los elementos semanales que necesitemos
echo "<h1>MEDIA SEMANAL</h1>";
//calculoSemanal("calorias","kcal");
calculoSemanal("carbohidratos","gr");
calculoSemanal("proteinas","gr");
calculoSemanal("lipidos","gr");
porcentajeSemanal();

// cerramos la conexion
mysql_close($conexion);

 ?>