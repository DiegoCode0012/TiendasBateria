<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/marca.css">
</head>
<body>  

   
    <?php
        require "../controlador/conexion.php";
        include "../includes/cabecera2.php";
        $conn = conectar();
        //PRIMER REQUEST DE LA PAGINA CATALOGO.php
        if (!isset($_REQUEST['idCat'])) {
        $CategoriaObject=null;
        }else{
        $CategoriaObject=buscarCategoria($_REQUEST['idCat'],$conn);     
        }    
      
        if($CategoriaObject!=null){

    ?>
      <div class="contenedorPadre">
        <div class="ListaDeMarcas">
        <div class="card" style="width: 18rem;margin-left: 30px">
            <ul class="list-group list-group-flush" style="text-align: center;">
    <?php

        foreach (listarMarca($conn,$CategoriaObject[0]) as $key => $value) {
        ?>

    <li style="font-size: 20px;font-weight: bold;padding: 10px" class="list-group-item">
        <a class="linksMarcas" 
        href="productos.php?idMarca=<?=$value[0]?>&?idCategoria=<?=$CategoriaObject[0]?>"><?=$value[1]?>
        </a>
    </li> 

<?php   
            }
        }
?>
         </ul>
         </div>
</div>

<div class="elementos">
    <?php
if($CategoriaObject!=null){
 $NombreCat=ucfirst($CategoriaObject[1]);
echo "<div class=lll>
<div class=mmmm><h4>$NombreCat</h4></div>
<div class=mmmm>
<select class=form-select form-select-lg mb-3 aria-label=Large select example>
  <option selected>Todos los Autos</option>
  <option value=1>Precio Menor a Mayor</option>
  <option value=2>Precio Mayor a Menor</option>
</select>

</div>
</div>";

 foreach (listarProductoXCategoria($conn,$CategoriaObject[0]) as $key => $value) {
  ?>
   <div class="items">
      <div class="ImagenProducto">
      <img  src="../images/<?=$value[3]?>">
      </div>
      <div style="text-align: center; margin-top: 10px">
      <strong><h5><?=$value[1]?></h5></strong>
      <h4 style="color: red">S/<?=$value[2]?> .00</h4>
      <div style="margin: 10px">
      <button  class="btn btn-secondary">Agregar</button>
      </div>
      </div>  
    </div>   
<?php 
}
}
?>


</div>

</div>



        <?php
        include '../includes/footer2.php';
    ?>
    </body>
</html>