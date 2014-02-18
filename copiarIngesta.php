<?php 
// #####################  COPIA LA INGESTA AL LUGAR SELECCIONADO   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

$diaAntiguo = $_SESSION['dia'];
$comidaAntigua = $_SESSION['comida'];
$dieta = $_SESSION['dieta'];
$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

//funcion que copia la ingesta, introducimos primero donde copiamos que comprueba si el checbox del formulario esta puesto y si lo esta lo copia al dia y a la comida
function copiarIngesta($dondeCopiar, $dia, $comida)
{
	GLOBAL $diaAntiguo,$comidaAntigua,$dieta,$usuario,$contrasena;

	if (isset($_POST[$dondeCopiar])) 
	{
		//hacemos la consulta
		$peticion = mysql_query("SELECT * FROM midieta WHERE usuario='".$usuario."' AND contrasena='".$contrasena."' AND dia='".$diaAntiguo."' AND comida='".$comidaAntigua."' AND dieta='".$dieta."'");
		//asigno a una variable el resultado
		while ($fila = mysql_fetch_array($peticion))
		{
			$usuario = $fila['usuario'];
			$contrasena = $fila['contrasena'];
			$alimento = $fila['alimento'];
			$gramos = $fila['gramos'];
			$calorias = $fila['calorias'];
			$carbohidratos = $fila['carbohidratos'];
			$lipidos = $fila['lipidos'];
			$proteinas = $fila['proteinas'];
			
			mysql_query("INSERT INTO midieta (usuario, contrasena, dieta, dia, comida, alimento, gramos, calorias, carbohidratos, lipidos, proteinas) VALUES ('".$usuario."','".$contrasena."','".$dieta."','".$dia."','".$comida."','".$alimento."',".$gramos.",".$calorias.",".$carbohidratos.",".$lipidos.",".$proteinas.")");
		}
	}
}

copiarIngesta('lunesDesayuno','lunes','desayuno');
copiarIngesta('martesDesayuno','martes','desayuno');
copiarIngesta('miercolesDesayuno','miercoles','desayuno');
copiarIngesta('juevesDesayuno','jueves','desayuno');
copiarIngesta('viernesDesayuno','viernes','desayuno');
copiarIngesta('sabadoDesayuno','sabado','desayuno');
copiarIngesta('domingoDesayuno','domingo','desayuno');

copiarIngesta('lunesMediamanana','lunes','mediamanana');
copiarIngesta('martesMediamanana','martes','mediamanana');
copiarIngesta('miercolesMediamanana','miercoles','mediamanana');
copiarIngesta('juevesMediamanana','jueves','mediamanana');
copiarIngesta('viernesMediamanana','viernes','mediamanana');
copiarIngesta('sabadoMediamanana','sabado','mediamanana');
copiarIngesta('domingoMediamanana','domingo','mediamanana');

copiarIngesta('lunesAlmuerzo','lunes','almuerzo');
copiarIngesta('martesAlmuerzo','martes','almuerzo');
copiarIngesta('miercolesAlmuerzo','miercoles','almuerzo');
copiarIngesta('juevesAlmuerzo','jueves','almuerzo');
copiarIngesta('viernesAlmuerzo','viernes','almuerzo');
copiarIngesta('sabadoAlmuerzo','sabado','almuerzo');
copiarIngesta('domingoAlmuerzo','domingo','almuerzo');

copiarIngesta('lunesMerienda','lunes','merienda');
copiarIngesta('martesMerienda','martes','merienda');
copiarIngesta('miercolesMerienda','miercoles','merienda');
copiarIngesta('juevesMerienda','jueves','merienda');
copiarIngesta('viernesMerienda','viernes','merienda');
copiarIngesta('sabadoMerienda','sabado','merienda');
copiarIngesta('domingoMerienda','domingo','merienda');

copiarIngesta('lunesCena','lunes','cena');
copiarIngesta('martesCena','martes','cena');
copiarIngesta('miercolesCena','miercoles','cena');
copiarIngesta('juevesCena','jueves','cena');
copiarIngesta('viernesCena','viernes','cena');
copiarIngesta('sabadoCena','sabado','cena');
copiarIngesta('domingoCena','domingo','cena');

copiarIngesta('lunesRecena','lunes','recena');
copiarIngesta('martesRecena','martes','recena');
copiarIngesta('miercolesRecena','miercoles','recena');
copiarIngesta('juevesRecena','jueves','recena');
copiarIngesta('viernesRecena','viernes','recena');
copiarIngesta('sabadoRecena','sabado','recena');
copiarIngesta('domingoRecena','domingo','recena');


//cerramos conexion
mysql_close($conexion);

//redireccionamos a la pagina principal
include('redireccion.php');

 ?>