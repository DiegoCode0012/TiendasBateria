<?php
function conectar() {
    $conn= mysqli_connect("localhost:3310","root","","baterias2"); 
    if(!$conn){
        die("No puede conectarse ".mysqli_error());
    }
    else{
        //echo "Conexión satisfactoria";
    }
    return $conn; 
}
/*CONSULTAS VARIADAS */

function listarProductoSegunCategoriaMarca($conn,$idCat,$idMarca){
  $sql = "select * FROM bateria b
  inner join marca m on m.id=b.id_marca
  inner join categoria c on c.id_categoria=b.id_cat
  WHERE b.id_marca='$idMarca' && b.id_cat='$idCat'";

    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}


function listarProductoSegunCategoriaMarcaXPaginacion($conn,$idCat,$idMarca,$empieza,$por_pagina){
  $sql = "select * FROM bateria b
  inner join marca m on m.id=b.id_marca
  inner join categoria c on c.id_categoria=b.id_cat
  WHERE b.id_marca='$idMarca' && b.id_cat='$idCat'
  LIMIT $empieza,$por_pagina
  ";

    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

function listarProductoXCategoria($conn,$idcat){
       $sql="select b.id_bat,b.descripcion,b.precio,b.img,b.id_marca,b.id_cat from categoria c 
       inner join bateria b on c.id_categoria=b.id_cat 
       WHERE b.id_cat='$idcat'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}


function listarXCategoriaXMarca($conn,$idcat){
       $sql="select * from categoria c 
       inner join categoria_marca cm on c.id_categoria=cm.id_cat
       inner join marca m on m.id=cm.id_marca 
       WHERE c.id_categoria='$idcat'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}



function listarProductoSegunMarca($conn,$idMarca){
    $sql="select * from bateria where idMarca='$idMarca'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}


//BATERIA CRUD

function listarBateria($conn){
    $sql="select * from bateria";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

//PAGINACION
function listarBateriaPaginacion($conn,$empieza,$por_pagina){
    $sql="select * from bateria LIMIT $empieza,$por_pagina";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

function agregarBateria($conn,$des,$prec,$stock,$img,$id_marca,$id_cat) {
    $sql = "INSERT INTO bateria (descripcion,precio,stock,img,id_marca,id_cat) 
    VALUES ('$des','$prec','$stock','$img','$id_marca','$id_cat')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function buscarBateria($conn,$cod){
    $sql="select  id_bat, descripcion,precio,stock,img,id_marca,id_cat from bateria where id_bat='$cod'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec; 
}

function eliminarBateria($conn,$cod){
    $sql="delete from bateria where id_bat='$cod'";    
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function actualizarBateria($conn,$cod,$des,$prec,$stock,$img,$id_marca,$id_cat){
    $sql="update bateria set descripcion='$des', precio='$prec',stock=$stock,img='$fot',id_marca='$id_marca',id_cat=$id_cat where id_bat='$cod'";   
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

//CATEGORIA CRUD
function listarCategoria($conn){
    $sql="select id_categoria, descripcion,img from categoria";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}
function listarCategoriaPaginacion($conn,$empieza,$por_pagina){
    $sql="select * from categoria LIMIT $empieza,$por_pagina";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}




function agregarCategoria($conn, $des, $fot) {
    $sql = "INSERT INTO categoria (descripcion,img) VALUES ('$des', '$fot')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}
function buscarCategoria($conn,$cod){
    $sql="select  id_categoria, descripcion,img from categoria where id_categoria='$cod'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec; 
}

function eliminarCategoria($conn,$cod){
    $sql="delete from categoria where id_categoria='$cod'";    
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function actualizarCategoria($conn,$cod,$des,$fot){
    $sql="update categoria set descripcion='$des', img='$fot' where id_categoria='$cod'";   
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}




//MARCA CRUD


function listarMarca($conn){
    $sql="select * from marca";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}

function listarMarcaPaginacion($conn,$empieza,$por_pagina){
    $sql="select * from marca LIMIT $empieza,$por_pagina";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}
function agregarMarca($conn, $des) {
    $sql = "INSERT INTO marca (marca) VALUES ('$des')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function buscarMarca($conn,$cod){
    $sql="select  id, marca from marca where id='$cod'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec; 
}
function eliminarMarca($conn,$cod){
    $sql="delete from marca where id='$cod'";    
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function actualizarMarca($conn,$cod,$des){
    $sql="update marca set marca='$des' where id='$cod'";   
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

/* CRUD USER*/
function agregarUser($conn, $user,$pass,$nombre,$apel,$dni,$id_rol) {
    $sql = "INSERT INTO usuario (user,password,nombre,apellido,dni,id_rol) 
    VALUES ('$user','$pass','$nombre','$apel','$dni','$id_rol')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

function validarUsuario($usu,$pas,$conn){
    $sql="select * from usuario where user='$usu' and password='$pas'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec;   
}

//PEDIDOS

function ListarPedido($conn){
    $sql="select * from pedido";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   while($f=mysqli_fetch_array($res)){
        $vec[]= $f;
    }
    return $vec; 
}

function listarPedidoPaginacion($conn,$empieza,$por_pagina){
    $sql="select * from pedido LIMIT $empieza,$por_pagina";
    $res= mysqli_query($conn, $sql);
    $vec=array();
    while($f= mysqli_fetch_array($res))  
        $vec[]=$f;
    return $vec;
}
function agregarPedido($conn, $trans,$fecha,$status,$id_cliente,$monto) {
    $sql = "INSERT INTO pedido (id_transaccion,fecha, status, id_cliente, monto) VALUES (?, ?, ?, ?, ?)";

    // Crear una declaración preparada
    $stmt = mysqli_prepare($conn, $sql);

    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "ssssd", $trans, $fecha, $status, $id_cliente, $monto);

    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);

    // Verificar si hubo algún error
    if (mysqli_stmt_error($stmt)) {
        die("Error en la consulta en PEDIDO: " . mysqli_stmt_error($stmt));
    }

    // Cerrar la declaración preparada
    mysqli_stmt_close($stmt);
}

function agregarDetalle($conn, $id_producto, $cantidad, $pedidoID) {
    // Preparar la consulta
    $sql = "INSERT INTO detalle_pedido (id_producto, cantidad, id_pedido) VALUES (?, ?, ?)";
    
    // Crear una declaración preparada
    $stmt = mysqli_prepare($conn, $sql);
    
    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "iii", $id_producto, $cantidad, $pedidoID);
    
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    
    // Verificar si hubo algún error
    if (mysqli_stmt_error($stmt)) {
        die("Error en la consulta EN DETALLE: " . mysqli_stmt_error($stmt));
    }
    
    // Cerrar la declaración preparada
    mysqli_stmt_close($stmt);
}


function ultimo($conn){
    $sql="SELECT * from pedido ORDER BY fecha desc LIMIT 1";
   $res= mysqli_query($conn, $sql);
    $vec=array();
   if(mysqli_num_rows($res)>0){
        $vec= mysqli_fetch_array($res);
    }
    return $vec; 

}
//relacionamos un pedido con sus detalles y cada detalle tiene relacionado a un solo producto
function VerPedido($conn,$transaccion){
    $sql="select * from pedido p 
    inner join detalle_pedido de on de.id_pedido=p.id_pedido 
    inner join bateria b on b.id_bat=de.id_producto 
    WHERE p.id_transaccion='$transaccion'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   while($f=mysqli_fetch_array($res)){
        $vec[]= $f;
    }
    return $vec; 
}

function VerPedido2($conn,$id){
    $sql="select * from pedido p 
    inner join detalle_pedido de on de.id_pedido=p.id_pedido 
    inner join bateria b on b.id_bat=de.id_producto 
    WHERE p.id_pedido='$id'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   while($f=mysqli_fetch_array($res)){
        $vec[]= $f;
    }
    return $vec; 
}

function VerPedido3($conn,$idP,$idUser){
    $sql="select * from pedido p 
    inner join detalle_pedido de on de.id_pedido=p.id_pedido 
    inner join bateria b on b.id_bat=de.id_producto 
    inner join usuario u on u.id_user=p.id_cliente
    WHERE p.id_pedido='$idP' && p.id_cliente='$idUser'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   while($f=mysqli_fetch_array($res)){
        $vec[]= $f;
    }
    return $vec; 
}

function listarPedidosXUsuario($conn,$idUser){
      $sql="select * from pedido p 
      inner join usuario u on u.id_user=p.id_cliente
    WHERE p.id_cliente='$idUser'";
    $res= mysqli_query($conn, $sql);
    $vec=array();
   while($f=mysqli_fetch_array($res)){
        $vec[]= $f;
    }
    return $vec; 
}

function eliminarPedido($conn,$cod){
    $sql="delete from pedido where id='$cod'";    
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}


?>




