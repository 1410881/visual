<?php
// Recibir los datos del formulario
$nombreCliente = $_POST['nombreCliente'];
$emailCliente = $_POST['emailCliente'];
$productos = $_POST['nombreProducto'];
$precios = $_POST['precioProducto'];
$tipoDocumento = $_POST['tipoDocumento']; // Tipo de documento (Factura o Boleta)

// Calcular el total
$total = 0;
for ($i = 0; $i < count($precios); $i++) {
    $total += $precios[$i];
}

// Si es Boleta, solo mostrar la boleta en la página web
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta Electrónica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .factura-container {
            background-color: white;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .factura-header, .factura-footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .factura-header h2 {
            color: #007bff;
        }
        .factura-cliente, .factura-productos {
            margin-bottom: 20px;
        }
        .factura-productos table {
            width: 100%;
            border-collapse: collapse;
        }
        .factura-productos table, .factura-productos th, .factura-productos td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .factura-productos th {
            background-color: #007bff;
            color: white;
        }
        .factura-footer h3 {
            color: #28a745;
        }
        .boton-regresar {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }
        .boton-regresar:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Boleta Electrónica</h1>

    <div class="factura-container">
        <div class="factura-header">
            <h2>Boleta Electrónica</h2>
        </div>

        <div class="factura-cliente">
            <strong>Nombre:</strong> <?= htmlspecialchars($nombreCliente); ?><br>
            <strong>Email:</strong> <?= htmlspecialchars($emailCliente); ?><br>
        </div>

        <div class="factura-productos">
            <h3>Productos</h3>
            <table>
                <tr><th>Producto</th><th>Precio</th></tr>
                <?php
                for ($i = 0; $i < count($productos); $i++) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($productos[$i]) . "</td>";
                    echo "<td>S/" . number_format($precios[$i], 2) . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <div class="factura-footer">
            <h3>Total a pagar: S/<?= number_format($total, 2); ?></h3>
        </div>

        <!-- Botón Regresar -->
        <a href="index.php" class="boton-regresar">Regresar</a>

    </div>

</body>
</html>
