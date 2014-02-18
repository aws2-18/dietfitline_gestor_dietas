<?php 
// #####################  REDIRECCIONA A LA PAGINA PRINCIPAL   ###########################

echo'
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=principal.php?dieta='.$_SESSION['dieta'].'&calorias='.$_SESSION['calorias'].'">
	</head>
</html>
';

 ?>