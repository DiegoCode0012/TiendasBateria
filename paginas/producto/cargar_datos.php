<?php 

require("../../controlador/conexion.php");
$conn = conectar();
$marca = $_POST['marca'];
if($marca=="Todos"){
 $resultados=listarBateria($conn);
}else{
 $resultados=listarProductoSegunMarca($conn,$marca);
}
 $jsonProductos = json_encode($resultados);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
 echo $jsonProductos;
?>

