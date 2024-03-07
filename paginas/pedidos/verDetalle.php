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

		if(isset($_SESSION['usuario']['usuario']) && isset($_REQUEST['id'])){
		$conn = conectar();
		$arreglo=VerPedido2($conn,$_REQUEST['id']);
		
}else{
			header("location:../logueo.php");
		
}
	?>

<?php 
if(count($arreglo)>0){
?>
<div class="centrar">
<div><p><?=$arreglo[0]['id_transaccion']?></p></div>
<div><p><?=$arreglo[0]['fecha']?></div>
<div><p><?=$arreglo[0]['monto']?></div>
	</div> 
	<table class="table">
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