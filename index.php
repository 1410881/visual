<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Facturación Electrónica</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1, h3 { color: #333; }
        form { background-color: #f9f9f9; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; }
        label { display: block; margin: 10px 0 5px; }
        input[type="text"], input[type="email"], input[type="number"], select {
            width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;
        }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

    <h1>Sistema de Facturación Electrónica</h1>
    
    <form action="procesar_factura.php" method="POST">
        <h3>Datos del Cliente</h3>
        <label for="nombreCliente">Nombre del Cliente:</label>
        <input type="text" id="nombreCliente" name="nombreCliente" required>

        <label for="emailCliente">Email del Cliente:</label>
        <input type="email" id="emailCliente" name="emailCliente" required>

        <h3>Tipo de Documento</h3>
        <label for="tipoDocumento">Seleccione tipo de documento:</label>
        <select id="tipoDocumento" name="tipoDocumento" required>
            <option value="Factura">Factura</option>
            <option value="Boleta">Boleta</option>
        </select>

        <h3>Productos</h3>
        <div id="productos">
            <div class="producto">
                <label for="nombreProducto1">Nombre del Producto:</label>
                <input type="text" id="nombreProducto1" name="nombreProducto[]" required>

                <label for="precioProducto1">Precio del Producto:</label>
                <input type="number" id="precioProducto1" name="precioProducto[]" min="0.01" step="0.01" required>
            </div>
        </div>

        <button type="button" onclick="agregarProducto()">+ Agregar otro producto</button><br><br>
        <input type="submit" value="Generar Documento">
    </form>

    <script>
        let contadorProductos = 1;

        function agregarProducto() {
            contadorProductos++;
            const productosDiv = document.getElementById('productos');
            const nuevoProducto = document.createElement('div');
            nuevoProducto.classList.add('producto');
            nuevoProducto.innerHTML = `
                <label for="nombreProducto${contadorProductos}">Nombre del Producto:</label>
                <input type="text" id="nombreProducto${contadorProductos}" name="nombreProducto[]" required>
                <label for="precioProducto${contadorProductos}">Precio del Producto:</label>
                <input type="number" id="precioProducto${contadorProductos}" name="precioProducto[]" min="0.01" step="0.01" required>
            `;
            productosDiv.appendChild(nuevoProducto);
        }
    </script>

</body>
</html>
