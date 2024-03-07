<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['usuario']['usuario'])){// isset prueba si existe la variable usuario si no exista devuelve false
			
		include '../../includes/admin2.php';
		require("../../controlador/conexion.php");
		$conn = conectar();
}else{
		header("location:logueo.php");
	
}
	?>

<div class="flexHijo2">
	<h1 style="color:red">Formulario Agregar Marca</h1>
	<form class="formulario" action="../../llamadas/procesoMarca.php">	
	<div class="cajaForm">
		<input class="inputForm" type="text" name="descripcion" placeholder="Ingrese la marca">
	</div>
	<div class="cajaForm">
			<input class="inputForm" type="hidden" name="accion" value="agregar">
	</div>
	<input  type="hidden" name="accion" value="agregar">
	<div  class="cajaForm">
		<input class="botonAgregar" type="submit" name="agregar" value="Agregar">
	</div>	
</form>
	</div>
</body>
</html>




