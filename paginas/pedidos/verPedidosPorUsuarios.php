<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
</head>
<body>

	<?php
		include '../../includes/cabecera3.php';
		require("../../controlador/conexion.php");

		if(!isset($_SESSION['usuario']['usuario'])){// isset prueba si existe la variable usuario si no exista devuelve
			header("location:../logueo.php");
}else{
		$conn = conectar();
		$arreglo=listarPedidosXUsuario($conn,$_SESSION['usuario']['id']);
		
}
	?>

<?php 
if(count($arreglo)>0){
?>
<div class="centrar">
<div><p><?=$arreglo[0]['user']?></p></div>
<div><p><?=$arreglo[0]['nombre']?> <?=$arreglo[0]['apellido']?></p></div>
<div><h1>Relación de pedidos</h1></div>
	</div>
	<table class="table">
		<thead>
		<tr class="cabecera">
			<th>Código</th>
			<th>Transacción</th>
			<th>Fecha</th>
			<th>Status</th>
			<th>Monto</th>
			<th>Detalle</th>
		</tr>
		</thead>
		<?php
			foreach ($arreglo as $key => $value) {
		?>	
			<tr>
				<td><?=$value[0]?></td>
				<td><?=$value[1]?></td>
				<td><?=$value[2]?></td>
				<td><?=$value[3]?></td>
				<td><?=$value[5]?></td>
				<td><a style="background: red; border-radius:60px;padding: 10px; text-decoration: none;color:white" href="verDetalle.php?id=<?=$value[0]?>">Ver</a>
			</tr>
		<?php	
			}
		?>
		
		
	</table>
<?php 
}else
{
?>
<div>No hay pedidos </div>
<?php 
}
?>
</body>
</html>