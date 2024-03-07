<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/marca.css">
</head>
<body>  

  <!-- Filtrado por categoría y marca -->
<select id="categoriaSelect">
  <option value="todas">Todas las categorías</option>
  <option value="electronica">Electrónica</option>
  <option value="ropa">Ropa</option>
  <!-- Agrega más opciones según tus categorías -->
</select>

<select id="marcaSelect">
  <option value="todas">Todas las marcas</option>
  <option value="marca1">Marca 1</option>
  <option value="marca2">Marca 2</option>
  <!-- Agrega más opciones según tus marcas -->
</select>

<button onclick="filtrarProductos()">Filtrar</button>

<!-- Mostrar productos filtrados -->
<div id="productosContainer"></div>

<!-- Carrito de compras -->
<div id="carrito">
  <h2>Carrito de compras</h2>
  <ul id="carritoLista"></ul>
</div>

  <script type="text/javascript">
// Datos de ejemplo (pueden ser obtenidos de una base de datos)
const productos = [
  { nombre: 'Producto 1', categoria: 'electronica', marca: 'marca1' },
  { nombre: 'Producto 2', categoria: 'ropa', marca: 'marca2' },
  // Agrega más productos con diferentes categorías y marcas
];

// Función para mostrar productos según la categoría y marca seleccionadas
function filtrarProductos() {
  const categoriaSeleccionada = $('#categoriaSelect').val();
  const marcaSeleccionada = $('#marcaSelect').val();

  const productosFiltrados = productos.filter(producto => {
    return (
      (categoriaSeleccionada === 'todas' || producto.categoria === categoriaSeleccionada) &&
      (marcaSeleccionada === 'todas' || producto.marca === marcaSeleccionada)
    );
  });

  mostrarProductos(productosFiltrados);
}

// Función para mostrar productos en el contenedor
function mostrarProductos(productos) {
  const productosContainer = $('#productosContainer');
  productosContainer.empty();

  productos.forEach(producto => {
    const productoDiv = $('<div>');
    productoDiv.text(`${producto.nombre} - ${producto.categoria} - ${producto.marca}`);

    // Botón para agregar al carrito
    const agregarAlCarritoBtn = $('<button>').text('Agregar al carrito');
    agregarAlCarritoBtn.click(() => agregarAlCarrito(producto));
    productoDiv.append(agregarAlCarritoBtn);

    productosContainer.append(productoDiv);
  });
}

// Función para agregar productos al carrito
function agregarAlCarrito(producto) {
  const carritoLista = $('#carritoLista');
  const itemCarrito = $('<li>').text(`${producto.nombre} - ${producto.categoria} - ${producto.marca}`);
  carritoLista.append(itemCarrito);
}
</script>
 
    </body>
</html>