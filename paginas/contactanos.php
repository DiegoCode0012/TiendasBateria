<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/contactanos.css">
	<title></title>
</head>
<body>
<?php
		require("../controlador/conexion.php");
		$conn = conectar();
		include '../includes/cabecera2.php';
	?>
<!--  <div style="margin: 50px 300px 30px 300px">
<img style="width: 100%;height: auto;" src="https://gelice.com.mx/wp-content/uploads/2022/01/contactanos-header-scaled.jpg">
</div> -->

<div>
<h2>Encuentranos</h2>

</div>
<div class="contenedorPadreContactanos">
  <div class="contenedorContacto">
    <div>
      <h2>Lima</h2>
        <p>Av. Canadá 996-A, La Victoria - Lima</p>
    <p>Teléfono: (01) 480-0419 / Celular: 987-974-913</p>
    <div>
    <img src="https://www.todobaterias.pe/images/map-lima.jpg">
    </div>
    </div>
  </div>
<form class="formularioSimple">
  <div>
    <h2>DEJANOS UN MENSAJE</h2>
  </div>
  <div>
  <input class="inputText" type="text" name="" placeholder="Nombres">
  </div>
  <div>
  <input class="inputText" type="text" name="" placeholder="Telefono">
  </div>
  <div>
  <input class="inputText" type="text" name="" placeholder="Email">
  </div>
  <div>
  <textarea  class="inputText" placeholder="Mensaje"></textarea>
  </div>
  <div>
    <input  class="inputText" type="submit" name="Enviar">
  </div>
</form>
</div>
   <?php
		
		include '../includes/footer2.php';
	?>
</body>
</html>