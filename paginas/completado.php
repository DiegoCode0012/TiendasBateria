<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
</head>
<body>
<?php
		require("../controlador/conexion.php");
		$conn = conectar();
		$id_transacion=isset($_GET['key'])? $_GET['key']:'';
		if ($id_transacion =='') {
		  header("Location: ../index.php");
		}else{
			$consultaVerPedido=VerPedido($conn,$id_transacion);
		}
	?>
<h3>Gracias por  su pago</h3>
<p><?=$consultaVerPedido[0]['fecha']?></p>
<p>Folio de la Compra <?=$id_transacion?></p>
<p>Fecha de la TRANSACCION <?=$consultaVerPedido[0][2]?></p>
<p>Total S/<?=$consultaVerPedido[0][5]?></p>
<div style="display: flex;justify-content: center;">
<div style="width: 300px;">
<img style="width: 100%;height: 300px" src="https://c4.wallpaperflare.com/wallpaper/681/80/1009/anime-demon-slayer-kimetsu-no-yaiba-shinobu-kochou-hd-wallpaper-preview.jpg">	
</div>
</div>
<table class="table">
	<thead>
		<tr>
			<th>Producto</th>
			<th>Precio</th>
			<th>Cantidad</th>
			<th>Importe</th>
		</tr>
	</thead>

<?php foreach($consultaVerPedido as $key => $value) {
 $Importe=$value['cantidad']*$value['precio'];
?>
	<tr>
		<td><?=$value['descripcion']?></td>
		<td><?=$value['precio']?></td>
		<td><?=$value['cantidad']?></td>
		<td><?=$Importe?></td>
	</tr>
<?php 
}
?>
</table>
<a href="../index.php">Volver</a>
<script type="text/javascript">
    localStorage.removeItem("cart");
</script>
</body>
</html>