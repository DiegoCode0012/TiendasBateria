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

	<h1>Relación de Pedidos</h1>
	<table class="tabla">
		<thead>
		<tr>

			<th>Código</th>
			<th>Transicción</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>ID Cliente</th>
			<th>Monto</th>
			<th>Detalle</th>
			<th>Eliminar</th>
		</tr>
		</thead>
		<?php
			$empieza=($pagina-1)*$por_pagina;
			$resultado=listarPedidoPaginacion($conn,$empieza,$por_pagina);
			foreach ($resultado as $key => $value) {
		?>	
			<tbody>
			<tr>
				<td><?=$value[0]?></td>
				<td><?=$value[1]?></td>
				<td><?=$value[2]?></td>
				<td><?=$value[3]?></td>
				<td><?=$value[4]?></td>
				<td>S/<?=$value[5]?></td>
				<td><a class="ver" href="ver.php?id=<?=$value[0]?>&cliente_id=<?=$value[4]?>">Ver</a></td>
				<td><a  class="eliminar" href="../../llamadas/procesoPedidos.php?accion=eliminar&codigo=<?=$value[0]?>">Eliminar</a>
				</td>
			</tr>
		</tbody>
		<?php	
			}
		?>
		
	</table>
		<?php 
    	$query="select * from pedido";
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
</body>
</html>