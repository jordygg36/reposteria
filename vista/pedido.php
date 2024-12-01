<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Pedido</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <?php
    require_once("../vista/barranavadmin.php");
    ?>
    <script>
        function calcularPrecioTotal(index) {
            var cantidad = document.getElementById('cantidad' + index).value;
            var precioUnitario = document.getElementById('precio_unitario' + index).value;
            var precioTotal = cantidad * precioUnitario;
            document.getElementById('precio_total' + index).value = precioTotal.toFixed(2);
        }

        function agregarProducto() {
            var table = document.getElementById("productosTable");
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            row.innerHTML = `
                <td><select class="form-control" name="id_producto[]">
                    <?php
                        $productos = $modeloPedido->obtenerProductos();
                        while ($producto = $productos->fetch_assoc()) {
                            echo "<option value='" . $producto['ID_PRODUCTO'] . "'>" . $producto['NOMBRE'] . "</option>";
                        }
                    ?>
                </select></td>
                <td><input class="form-control" type="number" name="cantidad[]" id="cantidad${rowCount}" required oninput="calcularPrecioTotal(${rowCount})"></td>
                <td><input class="form-control" type="number" name="precio_unitario[]" id="precio_unitario${rowCount}" required oninput="calcularPrecioTotal(${rowCount})"></td>
                <td><input class="form-control" type="text" name="precio_total[]" id="precio_total${rowCount}" readonly></td>
            `;
        }
    </script>
</head>
<body>
    <form method="post">
        <div class="container">
            <h3>Registrar Pedido</h3>

            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-12">
                    <label class="form-control">ID Cliente: &nbsp;</label>
                    <input class="form-control" name="id_cliente" type="number" required>
                </div>
            </div>

            <table class="table" id="productosTable">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Precio Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="id_producto[]">
                                <?php
                                    // Mostrar productos desde la base de datos
                                    $productos = $modeloPedido->obtenerProductos();
                                    while ($producto = $productos->fetch_assoc()) {
                                        echo "<option value='" . $producto['ID_PRODUCTO'] . "'>" . $producto['NOMBRE'] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                        <td><input class="form-control" type="number" name="cantidad[]" id="cantidad0" required oninput="calcularPrecioTotal(0)"></td>
                        <td><input class="form-control" type="number" name="precio_unitario[]" id="precio_unitario0" required oninput="calcularPrecioTotal(0)"></td>
                        <td><input class="form-control" type="text" name="precio_total[]" id="precio_total0" readonly></td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-info" onclick="agregarProducto()">Agregar Producto</button>
            <br><br>

            <div class="row" style="padding-bottom:10px; text-align:center;">
                <div class="col-md-12">
                    <button class="btn btn-primary" name="btn_guardar" type="submit" style="width: 150px;">Grabar</button>
                </div>
            </div>
        </div>
    </form>

    <?php
        if (isset($_POST["btn_guardar"])) {
            // Recibir datos del formulario
            $productos = [];
            $cantidad = $_POST["cantidad"];
            $precio_unitario = $_POST["precio_unitario"];
            $id_producto = $_POST["id_producto"];

            for ($i = 0; $i < count($cantidad); $i++) {
                $productos[] = [
                    'id_producto' => $id_producto[$i],
                    'cantidad' => $cantidad[$i],
                    'precio_unitario' => $precio_unitario[$i]
                ];
            }

            // Crear el modelo y llamar al método insertar
            $modeloPedido->insertarPedido($productos);
        }
    ?>
</body>
<?php
    require_once("../vista/piepagina.php");
    ?>
</html>
