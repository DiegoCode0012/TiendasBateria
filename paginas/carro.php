<!DOCTYPE html>
<html>
<head>
  <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="../css/carro.css">

       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
</head>
<body>

<div class="FlexCabeceraCarro">
    <div class="item"><a href="../index.php"><img class="logo" src="../images/logoEmpresa.jpg"></a></div>
    <div class="item"><a class="seguir" href="prueba.php"><img  style="width: 20px;" src="https://plazavea.vteximg.com.br/arquivos/icono-arrow-to-cart.png"> Seguir Comprando</a></div>
</div>


<div class="PadreFlex">
  <div class="tablaP">
  <table id="tablaProductos">
  <thead>
    <tr>
      <th colspan="2">PRODUCTO</th>
      <th>PRECIO</th>
      <th>CANTIDAD</th>
      <th colspan="2">TOTAL</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
<div id="mensajeNoHay"></div>

</div>

  <table class="TablaImporte">
    <tr>
      <td>SubTotal</td>
      <td id="gran_total"></td>
    </tr>
    <tr>
      <td>IGV 0.18</td>
      <td id="igv"></td>
    </tr>
    <tr>
      <td style="color: red;font-weight: 900">Total</td>
      <td id="precioFinal"  style="color:blue;font-weight: 900"></td>
    </tr>
  <tr>
    <td colspan="2"><a style="width: 70%" href="pago.php"  class="btn btn-danger" >CONTINUAR</a></td>
  </tr>
    </table>
</div>

<script type="text/javascript">

  if (localStorage.getItem('cart')) {
carts=JSON.parse(localStorage.getItem('cart'));
if (carts.length>0) {
    var tablaProductos=document.getElementById('tablaProductos');
    var tbody = tablaProductos.querySelector('tbody');

  for (var i = 0; i <=carts.length-1; i++) {
  var fila = document.createElement('tr');
  fila.classList.add("row_"+carts[i].id);

  //CREANDO LA CELDA PARA LA IMAGEN
  var imgCelda = document.createElement('td');
  var imagen=document.createElement('img');
  imagen.src=carts[i].imagen;
  imagen.width=45;
  imagen.height=45;
  imgCelda.appendChild(imagen);

  fila.appendChild(imgCelda);

  //CREANDO LA CELDA PARA LA DESCRIPCION PRODUCTO

  var ProductoCelda= document.createElement('td');
  ProductoCelda.textContent =carts[i].name;
  fila.appendChild(ProductoCelda);


  //CREANDO LA CELDA PARA EL PRECIO PRODUCTO
  var PrecioCelda=document.createElement('td');
  PrecioCelda.id="precio_"+carts[i].id;
  PrecioCelda.textContent="S/"+carts[i].price;
  fila.appendChild(PrecioCelda);


  //CREANDO LA CELDA PARA EL CANTIDAD
  var cantidadCelda=document.createElement('td');
  var input=document.createElement('input');
  input.id="cantidad_"+carts[i].id;
  input.min="1";
  input.max=carts[i].stock;
  input.type="number";
  input.value=carts[i].quantity;
  input.style.width="90px";
  input.classList.add('form-control');
  input.addEventListener("change",calcularImporte,false);
  cantidadCelda.appendChild(input)
  fila.appendChild(cantidadCelda);

  //CREANDO LA CELDA PARA EL IMPORTE
  var TotalCelda=document.createElement('td');
  var spanTotal=document.createElement('span');
  spanTotal.style.color='red';
  spanTotal.style.fontWeight='bold';
  spanTotal.id="totalimporte_"+carts[i].id;
  spanTotal.textContent="S/"+carts[i].price*input.value;
  TotalCelda.appendChild(spanTotal);
  fila.appendChild(TotalCelda);

  //CREANDO CELDA PARA LA ELIMINACION
  var EliminarCelda=document.createElement('td');
  var enlaceId=document.createElement('button');
  enlaceId.textContent="X";
  enlaceId.id="eliminarLinea_"+carts[i].id;
  enlaceId.classList.add('btn','btn-danger');
  enlaceId.addEventListener("click",eliminarLinea,false);
  EliminarCelda.appendChild(enlaceId);

  fila.appendChild(EliminarCelda);

// OTRA CELDA

  tbody.appendChild(fila);
}

gran_total();
calcularIGV();
precioFinal();
function calcularImporte(){
 IDProducto=this.id.split('_')[1]; //this= el input, el ID DEL PRODUCTO
 Precio=parseFloat(document.getElementById("precio_"+IDProducto).textContent.split("/")[1]);
 document.getElementById("totalimporte_"+IDProducto).textContent="S/"+parseFloat(this.value)*Precio;
 modificarLaCantidad(this);
  gran_total();
  precioFinal();
} 
function gran_total(){
  total=0;
  var TotalCarro=document.getElementById("gran_total");
 var spans = document.getElementsByTagName('span'); //importe
 Array.from(spans).forEach(x=>{
   total+=parseFloat(x.textContent.split("/")[1]);
});
 TotalCarro.textContent="S/"+Math.round(total*100)/100;
}
function modificarLaCantidad(input){
carts=JSON.parse(localStorage.getItem('cart'));
id=parseFloat(input.id.split('_')[1]);
carts.forEach(x=>{
 if (x.id==id) {
   
    x.quantity=input.value;
    
 }
})
 gran_total();
calcularIGV();
precioFinal();
console.log(carts);
addToMemory(carts);
} 

function eliminarLinea(){
m=JSON.parse(localStorage.getItem('cart'));
var rowID=this.parentNode.parentNode; //row_id{#}
rowID.remove(); //para efecto de la pantalla
var id=parseFloat(this.id.split("_")[1]);
    carts=m.filter(x=>{
      return  x.id !=id;
    })
if(carts.length==0){
    var mensaje=document.getElementById("mensajeNoHay");
    mensaje.innerHTML="No hay productos presentes en el carro";
    mensaje.classList.add("alert","alert-success");
    console.log(mensaje);
}
  gran_total();
  calcularIGV();
  precioFinal();
  addToMemory(carts);
}
function calcularIGV(){
  var TotalCarro=document.getElementById("gran_total");
  var inpuestos=document.getElementById("igv");
  igv= 0.18*parseFloat(TotalCarro.textContent.split("/")[1]);
  inpuestos.textContent="S/"+Math.round(igv*100)/100;
}
function precioFinal(){
  var x=0;
var TotalCarro=parseFloat(document.getElementById("gran_total").textContent.split("/")[1]); //subottal
var inpuestos=parseFloat(document.getElementById("igv").textContent.split("/")[1]); //para conseguir solo el valor del precio y no 
var Final=document.getElementById("precioFinal");
x=TotalCarro+inpuestos;
Final.textContent="S/"+Math.round(x*100)/100;
}
function addToMemory(carts){
    localStorage.setItem('cart',JSON.stringify(carts));
}
}else{
  var mensaje=document.getElementById("mensajeNoHay");
   mensaje.innerHTML="No hay productos presentes en el carro";
   mensaje.classList.add("alert","alert-success");
      console.log(mensaje);
}
}



</script>
</body>
</html> 