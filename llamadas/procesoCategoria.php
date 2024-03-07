<?php
	require("../controlador/conexion.php");
	$conn = conectar();

	$action = $_REQUEST['accion'];
	if($action=="agregar"){
		$des = $_REQUEST['descripcion'];
		$fot = $_FILES['foto']['name'];
		$ruta = $_FILES['foto']['tmp_name'];
		$destino = '../images/categorias/'.$fot;
		copy($ruta, $destino);
		agregarCategoria($conn,$des,$fot);
	}
	else if($action=="eliminar"){
			$cod = $_REQUEST['codigo'];
			eliminarCategoria($conn,$cod);
	}
	else if($action=="modificar"){
		$cod = $_REQUEST['codigo'];
		$des = $_REQUEST['descripcion'];
		$fot = $_FILES['foto']['name'];
		$ruta = $_FILES['foto']['tmp_name'];
		$destino = '../images/categorias/'.$fot;
		copy($ruta, $destino);
		actualizarCategoria($conn,$cod,$des,$fot);
	}

	header("location:../paginas/categoria/listar.php");

?>