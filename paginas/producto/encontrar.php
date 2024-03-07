<?php 

require("../../controlador/conexion.php");
$conn = conectar();
$categoria = $_POST['ultimoBotonPresionado'];

$resultados=buscarCategoria($categoria,$conn);

 $jsonProductos = json_encode($resultados);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
 echo $jsonProductos;
?>

