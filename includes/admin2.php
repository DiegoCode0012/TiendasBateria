<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">  	
	<link rel="stylesheet" type="text/css" href="../../css/admin.css">
	<script src="https://kit.fontawesome.com/efe3882b3d.js" crossorigin="anonymous"></script>

</head>
<body>

<div class="panelAdmin">
		<div class="logo">
			<div>
			<img src="../../images/logoEmpresa.jpg">
			</div>
		</div>
				<h4 class="user">Usuario: <?= $_SESSION['usuario']?></h4>

	<ul class="principal">
			<li><a  href="../marca/listar.php"><i class="fa-solid fa-list"></i><span>Marcas</span></a></li>
			<li><a  href="../categoria/listar.php"><i class="fa-solid fa-layer-group"></i><span>Categorías</span></a></li>
			<li><a  href="../producto/listar.php"><i class="fa-solid fa-shop"></i><span>Baterias</span></a></li>
			<li><a href="../pedidos/listar.php"><i class="fa-solid fa-truck"></i><span>Pedidos</span></a></li>
			<li><a href="#"><i class="fa-solid fa-user-plus"></i><a href="#"><span>Usuarios</span></a></li>
			<li><a  href="../../llamadas/procesoCerrarSesion.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Cerrar sesión</a></li>
	</ul>

</div>

</div>

</body>
</html>