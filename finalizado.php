<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>Agencia de Viajes</title>
   <script src="https://www.paypal.com/sdk/js?client-id=
   Ac01YDoQKx4TpPgyw9jLDtd3YRPuxnxfmrdAtO1tJKQVbkbfHJBswK-OEOesieu-3ltONGrDkFk3shk7&currency=PEN"> // Replace YOUR_CLIENT_ID with your sandbox client ID
    </script>
</head>
<body>
<?php 
        require "controlador/conexion.php";
        $conn=conectar();
        $consulta=last_ID($conn);

?>
<div style="display: flex;justify-content: center;">
  <div style="width: 400px">
    <img style="width: 100%;height: 400px;border-radius: 50%" src="https://i.pinimg.com/originals/0e/d8/ea/0ed8eaf51f11ef79f1edfe79684dc97d.jpg">
  </div>
</div>
<p><?=$consulta[0]?></p>
</body>
</html>


