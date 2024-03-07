
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/catalogo.css">
</head>
<body>
	<?php
		include '../includes/cabecera2.php';
		require("../controlador/conexion.php");
		$conn = conectar();
	?>
<div class="contenedor">
	<?php
		foreach(listarCategoria($conn) as $key => $value) {
	?>
		<div class="itemCategoria">
			<div class="contenedorImagen">
				<img src="../images/categorias/<?=$value[2]?>">
			</div>
			<div class="tituloCategoria">
				<h2><?=$value[1]?></h2>
				<a href="marca.php?idCat=<?=$value[0]?>" class="btn btn-primary my-3 p-3">Ver Detalles</a>
			</div>
		</div>
	<?php
		}
	?>
	</div>


	<?php
		include '../includes/footer2.php';
	?>
</body>
</html>



