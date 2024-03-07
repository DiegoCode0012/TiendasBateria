<?php
	require("../controlador/conexion.php");
	$conn = conectar();

	$action = $_REQUEST['accion'];

	if($action=="agregar"){
	//	$cod = $_REQUEST['codigo'];
		$des = $_REQUEST['descripcion'];
		$pre = $_REQUEST['precio'];		
		$sto = $_REQUEST['stock'];
		$marca = $_REQUEST['marca'];
		$cat = $_REQUEST['categoria'];
		$fot = $_FILES['foto']['name'];
		$ruta = $_FILES['foto']['tmp_name'];
		$destino = '../images/'.$fot;
		copy($ruta, $destino);
		agregarBateria($conn,$des,$pre,$sto,$fot,$marca,$cat);
	}
	else if($action=="eliminar"){
		$cod = $_REQUEST['codigo'];
		eliminarBateria($conn,$cod);
	}
	else if($action=="modificar"){
		$cod = $_REQUEST['codigo'];
		$des = $_REQUEST['descripcion'];
		$pre = $_REQUEST['precio'];		
		$sto = $_REQUEST['stock'];
		$marca = $_REQUEST['marca'];
		$cat = $_REQUEST['categoria'];
		$fot = $_FILES['foto']['name'];
		$ruta = $_FILES['foto']['tmp_name'];
		$destino = '../images/'.$fot;
		copy($ruta, $destino);
		actualizarBateria($conn,$cod,$des,$pre,$sto,$fot,$marca,$cat);
	}

	header("location:../paginas/producto/listar.php");

?>
