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
		if(isset($_SESSION['usuario']['usuario'])){
			include '../../includes/admin2.php';
		require("../../controlador/conexion.php");
		$conn = conectar();
		$por_pagina=5;
		if(isset($_GET['pagina'])){
			$pagina=$_GET['pagina'];
		}else{
			$pagina=1;
		}
}else{
		header("location:logueo.php");
	
}
	?>

<div class="flexHijo2">
	<h1>Relaciones de Marcas</h1>
	<div class="agregando">
		<a href="agregar.php">Agregar</a>
	</div>

	<table class="tabla">
		<thead>
		<tr>
			<th>Código</th>
			<th>Descripcion</th>
			<th>Eliminar</th>
			<th>Modificar</th>
		</tr>
		</thead>
		<?php
			$empieza=($pagina-1)*$por_pagina;
			$resultado=listarMarcaPaginacion($conn,$empieza,$por_pagina);
			foreach ($resultado as $key => $value) {
		?>	
		<tbody>
			<tr>
				<td><?=$value[0]?></td>
				<td><?=$value[1]?></td>
				<td><a class="eliminar" href="../../llamadas/procesoMarca.php?accion=eliminar&codigo=<?=$value[0]?>">Eliminar</a></td>
				<td><a class="editar" href="modificar.php?codigo=<?=$value[0]?>">Modificar</a></td>
			</tr>
			</tbody>
		<?php	
			}
		?>
		
		
	</table>
	<?php 
    	$query="select * from marca";
		$resultado=mysqli_query($conn,$query);
		$total_registros=mysqli_num_rows($resultado);
		$total_paginas=ceil($total_registros/$por_pagina);
		echo "<center><a class='enlacePaginacion' href='?pagina=1'>".'Anterior'."</a>";
		for ($i=1; $i<=$total_paginas; $i++) { 
		echo "<a class='enlacePaginacion' href='?pagina=".$i."'>".$i."</a>";
		}
		echo "<a class='enlacePaginacion' href='?pagina=total_paginas'>".'Siguiente'."</a></center>";

		?>
</div>
	</div>
</body>
</html>