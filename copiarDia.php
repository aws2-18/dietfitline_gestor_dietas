<?php 
// #####################  COPIA LA INGESTA AL LUGAR SELECCIONADO   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

$diaAntiguo = $_SESSION['dia'];
$dieta = $_SESSION['dieta'];
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

//funcion que copia la ingesta, introducimos primero donde copiamos que comprueba si el checbox del formulario esta puesto y si lo esta lo copia al dia y a la comida
function copiarDia($dia)
{
	GLOBAL $diaAntiguo,$dieta,$usuario,$contrasena;

	if (isset($_POST[$dia])) 
	{
		//hacemos la consulta
		$peticion = mysql_query("SELECT * FROM midieta WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND dia='".$diaAntiguo."' AND dieta='".$dieta."' ");
		//asigno a una variable el resultado
		while ($fila = mysql_fetch_array($peticion))
		{
			$usuario = $fila['usuario'];
			$contrasena = $fila['contrasena'];
			$alimento = $fila['alimento'];
			$comida = $fila['comida'];
			$gramos = $fila['gramos'];
			$calorias = $fila['calorias'];
			$carbohidratos = $fila['carbohidratos'];
			$lipidos = $fila['lipidos'];
			$proteinas = $fila['proteinas'];
			
			mysql_query("INSERT INTO midieta (usuario, contrasena, dieta, dia, comida, alimento, gramos, calorias, carbohidratos, lipidos, proteinas) VALUES ('".$usuario."','".$contrasena."','".$dieta."', '".$dia."','".$comida."','".$alimento."',".$gramos.",".$calorias.",".$carbohidratos.",".$lipidos.",".$proteinas.")");
		}
	}
}


copiarDia('lunes');
copiarDia('martes');
copiarDia('miercoles');
copiarDia('jueves');
copiarDia('viernes');
copiarDia('sabado');
copiarDia('domingo');


//cerramos conexion
mysql_close($conexion);

//redireccionamos a la pagina principal
include('redireccion.php');

 ?>