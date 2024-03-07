<?php
	require("../controlador/conexion.php");
	$conn = conectar();

	$action = $_REQUEST['accion'];
	if($action=="agregar"){
		$des = $_REQUEST['descripcion'];
		agregarMarca($conn,$des);
	}
	else if($action=="eliminar"){
			$cod = $_REQUEST['codigo'];
			eliminarMarca($conn,$cod);
	}
	else if($action=="modificar"){
		$cod = $_REQUEST['codigo'];
		$des = $_REQUEST['descripcion'];
		actualizarMarca($conn,$cod,$des);
	}

	header("location:../paginas/marca/listar.php");

?>