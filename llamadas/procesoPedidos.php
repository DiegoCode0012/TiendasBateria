<?php
	require("../controlador/conexion.php");
	$conn = conectar();

	$action = $_REQUEST['accion'];
	 if($action=="eliminar"){
		$cod = $_REQUEST['codigo'];
		eliminarPedido($conn,$cod);
	}
	header("location:../paginas/pedidos/listar.php");

?>
