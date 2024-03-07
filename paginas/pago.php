<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="../css/carro.css">  
    <link rel="stylesheet" type="text/css" href="../css/pago.css">
<script src="https://www.paypal.com/sdk/js?client-id=AVMut6ZX0s0UlNemCDR1rmaj37qIYmL2hLiS-qkPHgms52bpBNJAW1y7c7O0xVA2NThgnq678nf58LKV"></script>
</head>
<body>

	<div class="FlexCabeceraCarro">
    <div class="item"><a href="../index.php"><img class="logo" src="../images/logoEmpresa.jpg"></a></div>
    <div class="item"><a class="seguir" href="carro.php"><img  style="width: 20px;" src="https://plazavea.vteximg.com.br/arquivos/icono-arrow-to-cart.png">Volver a carrito</a></div>
</div>
<script type="text/javascript">
m=JSON.parse(localStorage.getItem('cart'));
if(m.length==0){
    window.location.href = 'prueba.php';
}
</script>
<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
  header("location:prueba.php");
}
?>
<div class="Padre">
    <div class="tituloResumen">
      <h1>Resumen de la Compra</h1>
    </div>
  <table id="elementos">
  <tbody>
  </tbody>
  </table>
    <div class="precioshijo">
      <div>
       <b>Subtotal:</b>
        <h3 id="gran_total"></h3>
      </div>
      <div>
        <b>IGV:</b>
        <h3 id="igv"></h3>
      </div>
      <div>
        <b>TOTAL:</b>
        <h2 id="precioFinal"></h2>
      </div>
    </div> 
              <div id="paypal-button-container"></div>

</div>
<script type="text/javascript">
carts=JSON.parse(localStorage.getItem('cart'));
if (carts.length>0) {
  var tablaProductos=document.getElementById('elementos');
    var tbody = tablaProductos.querySelector('tbody');
     for (var i = 0; i <=carts.length-1; i++) {
  var row = document.createElement('tr');
  var row2 = document.createElement('tr');
  
  var quantityCell = document.createElement('td');
  quantityCell.textContent=""+carts[i].quantity + "un" ;
  row.appendChild(quantityCell);

  var descripCell =document.createElement('td');
  descripCell.textContent=carts[i].name;
  row.appendChild(descripCell);

  var imgCelda = document.createElement('td');
  var imagen=document.createElement('img');
  imagen.src=carts[i].imagen;
  imagen.width=45;
  imagen.height=45;
  imgCelda.appendChild(imagen);
  row2.appendChild(imgCelda);

  var importCell = document.createElement('td');
  var spanImport = document.createElement('span');

  spanImport.textContent="S/"+carts[i].price*parseInt(quantityCell.textContent.match(/\d+/)[0]); //exp regular encuentra concidencias numericas, en este caso el primer digito en encontrarse es la cantidad 
  spanImport.style.color='red';
  spanImport.id="importe_"+carts[i].id;
  importCell.appendChild(spanImport);
  row2.appendChild(importCell);
  tbody.appendChild(row);
  tbody.appendChild(row2);

}
gran_total();
calcularIGV();
precioFinal();
function gran_total(){
  var total=0;
  var TotalCarro=document.getElementById("gran_total");
  var spans = document.getElementsByTagName('span'); //importe
  Array.from(spans).forEach(x=>{
   total+=parseFloat(x.textContent.split("/")[1]);
});
 TotalCarro.textContent="S/"+Math.round(total*100)/100;
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

}


var x=parseFloat(document.getElementById("precioFinal").textContent.split("/")[1]);
var demi=x*0.27;
var demiRodeando=demi.toFixed(2);
 paypal.Buttons({
  style: {
    disableMaxWidth: true
  },  
  createOrder:function(data,actions) 
  {
          return actions.order.create({
            purchase_units:[{
              amount:{
                value:demiRodeando
              }
            }]
          })
        },
  onCancel:function(x){
  //  console.log(x);
    console.log(carts);
  },
  onApprove:function(data,actions){
    actions.order.capture().then(function(detalle_compra){
      if (detalle_compra.status ==="COMPLETED") {
        console.log(detalle_compra);
        let url='../llamadas/procesoPago.php';
        return fetch(url,{
        	method:'post',
        	headers:{
        		'content-type':'application/json'
        	},
        	body:JSON.stringify({
        		detalle_compra:detalle_compra,
        		carts:carts
        	})
        }).then(function(response){
          window.location.href="completado.php?key="+detalle_compra['id'];
        })
      }
    });
  }
}).render('#paypal-button-container');
</script>


</body>
</html>