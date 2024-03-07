<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<h1 style="color:red">Formulario Agregar Categoría</h1>
	<form class="formulario" action="../../llamadas/procesoCategoria.php" method="post" enctype="multipart/form-data">	
	<div class="cajaForm">
		<input class="inputForm" type="text" name="descripcion" placeholder="Ingrese la categoría">
	</div>
	<div class="cajaForm">
			<input class="inputForm" type="file" name="foto">
	</div>
	<input  type="hidden" name="accion" value="agregar">
	<div  class="cajaForm">
		<input class="botonAgregar" type="submit" name="agregar" value="Agregar">
	</div>	
</form>
	</div>
	
</body>
</html>