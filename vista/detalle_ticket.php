<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Ticket</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <?php
    require_once("../vista/barranavadmin.php");
    ?>
    <script>
        function calcularPrecioTotal() {
            var cantidad = document.getElementById('cantidad').value;
            var precioUnitario = document.getElementById('precio_unitario').value;
            var precioTotal = cantidad * precioUnitario;
            document.getElementById('precio_total').value = precioTotal.toFixed(2);
        }
    </script>
</head>
<body>
    <form method="post">
        <div class="container">
            <div class="row" style="padding-top:30px; padding-bottom:30px;">
                <div class="col-md-12" style="text-align:center;">
                    <h3>Registrar Detalle Ticket</h3>
                </div>
            </div>

            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-12">
                    <label class="form-control">ID Producto: &nbsp;</label>
                    <input class="form-control" name="id_producto" type="text" required>
                </div>
            </div>

            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-12">
                    <label class="form-control">Cantidad: &nbsp;</label>
                    <input class="form-control" name="cantidad" type="number" id="cantidad" min="1" required oninput="calcularPrecioTotal()">
                </div>
            </div>

            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-12">
                    <label class="form-control">Precio Unitario: &nbsp;</label>
                    <input class="form-control" name="precio_unitario" type="number" id="precio_unitario" step="0.01" required oninput="calcularPrecioTotal()">
                </div>
            </div>

            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-12">
                    <label class="form-control">Precio Total: &nbsp;</label>
                    <input class="form-control" name="precio_total" type="text" id="precio_total" readonly>
                </div>
            </div>

            <div class="row" style="padding-bottom:10px; text-align:center;">
                <div class="col-md-12">
                    <button class="btn btn-primary" name="btn_guardar" type="submit" style="width: 150px;">Grabar</button>
                    <button class="btn btn-success" style="width: 150px;">Cancelar</button>
                </div>
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST["btn_guardar"])) {
        // Recibir datos del formulario
        $id_producto = $_POST["id_producto"];
        $cantidad = $_POST["cantidad"];
        $precio_unitario = $_POST["precio_unitario"];

        // Crear el modelo y llamar al método insertar
        require_once $_SERVER['DOCUMENT_ROOT'] . "/reposteria/modelo/modeloDetalleTicket.php";
        $detalleTicket = new modeloDetalleTicket();
        $detalleTicket->insertarDetalleTicket($id_producto, $cantidad, $precio_unitario);
    }
    ?>
</body>
<?php
    require_once("../vista/piepagina.php");
    ?>
</html>
