<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="../css/login.css">

</head>
<body>
	<?php
		include '../includes/cabecera2.php';
	?>
	<div class="formFlex">
	<form class="form" action="../llamadas/procesoLogueo.php" method=" post">
	
			<img class="writeyourName" src="https://cdn-icons-png.flaticon.com/512/74/74472.png">
		
		<div  class="cajaForm">
			<input class="inputForm" type="text" name="usuario" placeholder="Nombre">
		</div>
		<div  class="cajaForm">
			<input class="inputForm" type="password" name="pass" placeholder="Password">
		</div>
		<div  class="cajaForm">
			<input class="boton" type="submit" name="enviar" value="Logueo">
		</div>
		<div class="cajaForm"><a href="registro.php">Registrate</a></div>
	</form>
	</div>
	<?php
		include '../includes/footer2.php';
	?>
</body>
</html>