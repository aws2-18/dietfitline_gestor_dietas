<?php
// #####################  MODIFICA EL ALIMENTO EN LA TABLA   ###########################

//empezamos sesion, realizamos conexion y seleccionamos la base de datos
include('conexion.php');

//recogemos las variables
$dieta = $_POST['dieta'];
$calorias = $_POST['calorias'];

$dietaAntigua = $_SESSION['dieta'];
$idDieta = $_SESSION['id'];

//hacemos la peticion
mysql_query("UPDATE nom_dietas SET dieta='".$dieta."', calorias='".$calorias."' WHERE id ='".$idDieta."'");
mysql_query("UPDATE midieta SET dieta='".$dieta."' WHERE usuario='".$_SESSION['usuario']."' AND contrasena='".$_SESSION['contrasena']."' AND  dieta='".$dietaAntigua."'");
//cerramos conexion
mysql_close($conexion);

//redireccionamos
echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=gestionDietas.php">
	</head>
</html>
';

?>