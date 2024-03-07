<?php
	require("../controlador/conexion.php");
	$conn = conectar();

	$usu = $_REQUEST['usuario'];
	$pas = $_REQUEST['pass'];

	$vector=validarUsuario($usu,$pas,$conn);

	if(count($vector)>0){
		session_start();
		$_SESSION['usuario']['usuario']= $vector['user'];
		$_SESSION['usuario']['id']= $vector['id_user'];
		header("location:../paginas/prueba.php");
	}

	else{
		echo "<script>alert('Usuario o password incorrectos');window.history.back();</script>";
	}

?>

