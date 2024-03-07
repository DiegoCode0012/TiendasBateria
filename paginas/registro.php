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
	<form class="form" action="../llamadas/procesoUser.php" method=" post">
		<h2 style="color: red">Crear Usuario</h2>
		<div  class="cajaForm">
			<input class="inputForm" type="text" name="nombre" placeholder="nombre">
		</div>
		<div  class="cajaForm">
			<input class="inputForm" type="text" name="apellido" placeholder="apellido">
		</div>
		<div  class="cajaForm">
			<input class="inputForm" type="text" name="dni" placeholder="dni">
		</div>
		<div  class="cajaForm">
			<input class="inputForm" type="text" name="user" placeholder="usuario">
		</div>
		<div  class="cajaForm">
			<input class="inputForm" type="password" name="password" placeholder="password">
		</div>
		<div  class="cajaForm">
			<input class="boton" type="submit" name="agregar" value="Crear Usuario">
		</div>
				<input type="hidden" name="accion" value="agregar"><br>

	</form>
	</div>

	<?php
		include '../includes/footer2.php';
	?>
</body>
</html>