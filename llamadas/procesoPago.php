<?php
	require("../controlador/conexion.php");
	session_start();
	$conn = conectar();
	$json=file_get_contents('php://input'); //recibir lo del pago detalle
	$datos=json_decode($json,true); //decodificar el json recibido
	if (is_array($datos)) {
		$transaccion=$datos['detalle_compra']['id'];
		$montoenDolares=$datos['detalle_compra']['purchase_units'][0]['amount']['value'];
		$montoenSoles=$montoenDolares/0.27;
		$status=$datos['detalle_compra']['status'];
		$fecha=$datos['detalle_compra']['update_time'];
		$fecha_nueva=date('Y-m-d H:i:s',strtotime($fecha));
	//	$email=$datos['detalles']['payer']['email_address'];
//		$id_cliente=$datos['detalle_compra']['payer']['payer_id'];
		echo "dsdasas".$transaccion;
		agregarPedido($conn,$transaccion,$fecha_nueva,$status,$_SESSION['usuario']['id'],$montoenSoles);
		$hola=ultimo($conn); //aqui hay un error , no puedo ocnseguir el ultimo id
	 	echo "string".$hola[0] . "TRANSACCION". $hola[1];
		if($hola[0]!=null){
		foreach ($datos['carts'] as $key => $value) {
			echo "PROBANDO 1 2 3".$hola[1];
			$cadena="";
		 	foreach($value as $ref => $valor){
			 	$cadena.= $valor.",";
			 }
			 $cadena=explode(",",$cadena);
			 $idProducto=intval($cadena[0]);
			 $cantidad=intval($cadena[5]);
			 echo "ID:".$idProducto. "cantidad". $cantidad. "id pedido". $hola[0]; 
			 agregarDetalle($conn,$idProducto,$cantidad,$hola[0]);

		}
			}	
		}
	
	
?>




