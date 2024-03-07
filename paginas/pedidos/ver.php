<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<?php
		include '../../includes/admin2.php';
		require("../../controlador/conexion.php");
		session_start();
		if(isset($_SESSION['usuario']['usuario'])){
			if(isset($_REQUEST['id']) && isset($_REQUEST['cliente_id'])){
			$conn = conectar();
			$arreglo=VerPedido3($conn,$_REQUEST['id'],$_REQUEST['cliente_id']);
			}else{
				header("location:../listar.php");

			}
		
		}else{
			header("location:../logueo.php");
		
		}
	?>

<?php 
if(count($arreglo)>0){
?>
<div class="flexHijo2">
	<div style="text-align: left;">
		<div style="margin: 10px;">
		<h1 style="color: green">Datos del Usuario</h1>
		<p style="font-size: 20px"><b>User:</b><span><?=$arreglo[0]['user']?></span></p>
		<p style="font-size: 20px"><b>Nombres:</b><span><?=$arreglo[0]['nombre']?> <?=$arreglo[0]['apellido']?></span></p>
		<p style="font-size: 20px"><b>Dni:</b><span><?=$arreglo[0]['dni']?></span></p>
		</div>
		<div style="margin: 10px;">
		<h1  style="color: green">Datos del Pedido</h1>
		<p style="font-size: 20px"><b>Transacción:</b><span><?=$arreglo[0]['id_transaccion']?></span></p>
		<p style="font-size: 20px"><b>Fecha:</b><span><?=$arreglo[0]['fecha']?></span></p>
		<p style="font-size: 20px"><b>Monto:</b><span><?=$arreglo[0]['monto']?></span></p>
		</div>
		<div style="margin: 10px;">
		<h1  style="color: green">Datos de Productos</h1>
		</div>
	</div>
	<table class="tabla">
		<thead>
		<tr>
			<th colspan="2">Producto</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Importe</th>
		</tr>
		</thead>
		<?php
			foreach ($arreglo as $key => $value) {
			 $Importe=$value['cantidad']*$value['precio'];
		?>	
			<tr>
		<td><img style="width: 45px;height: 45px" src="../../images/<?=$value['img']?>"></td>
		<td><?=$value['descripcion']?></td>
		<td>S/<?=$value['precio']?></td>
		<td><?=$value['cantidad']?></td>
		<td>S/<?=$Importe?></td>
			</tr>
		<?php	
			}
		?>
		
		
	</table>
</div>
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