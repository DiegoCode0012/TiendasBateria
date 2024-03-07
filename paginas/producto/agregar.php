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
	<form class="formulario" action="../../llamadas/procesoProducto.php" method="post" enctype="multipart/form-data">	
	<div class="cajaForm">
		<input class="inputForm" type="text" name="descripcion" placeholder="Ingrese nombre de la batería">
	</div>
	<div class="cajaForm">
			<input class="inputForm" type="text" name="precio" placeholder="Ingrese el precio">
	</div>
	<div class="cajaForm">
			<input class="inputForm" type="text" name="stock" placeholder="Ingrese el stock">
	</div>
	<div class="cajaForm">
			<input class="inputForm" type="file" name="foto" placeholder="Ingrese foto">
	</div>
	<div class="cajaForm">
		<select name="marca">
		<?php
			foreach (listarMarca($conn) as $key => $valor) {
		?>	
			<option value="<?=$valor[0]?>"><?=$valor[1]?></option>
		<?php
			}
		?>
		</select>
	</div>
	<div class="cajaForm">
		<select name="categoria">
		<?php
			foreach (listarCategoria($conn) as $key => $valor) {
		?>	
			<option value="<?=$valor[0]?>"><?=$valor[1]?></option>
		<?php
			}
		?>
		</select>
	</div>
<input type="hidden" name="accion" value="agregar">
	<div  class="cajaForm">
		<input class="botonAgregar" type="submit" name="agregar" value="Agregar">
	</div>	
</form>
	</div>

	
</body>
</html>