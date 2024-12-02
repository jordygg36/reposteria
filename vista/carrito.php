<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/reposteria/config/connect_db.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/reposteria/modelo/modeloCarrito.php";

$carrito = new modeloCarrito();
$productosCarrito = $carrito->obtenerCarrito();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/reposteria/css/base.css" rel="stylesheet" type="text/css">
    <link href="/reposteria/css/carrito.css" rel="stylesheet" type="text/css">
</head>
<?php
require_once("navbar.php");
?>


<body>
    <div class="carrito-container">
        <h3>Tu Carrito de Compras</h3>
        <div class="product-container">
            <?php
            if (count($productosCarrito) > 0) {
                foreach ($productosCarrito as $producto) {
                    if (isset($producto['ID_PRODUCTO'])) {
                        echo "<div class='product-card'>";
                        echo "<img src='/reposteria/img/menu/{$producto['IMAGEN']}' alt='Imagen del Producto' class='product-img'>";
                        echo "<div class='product-details'>";
                        echo "<h5>{$producto['NOMBRE']}</h5>";
                        echo "<p>{$producto['DESCRIPCION']}</p>";
                        echo "<p><strong>Costo:</strong> \${$producto['COSTO']}</p>";
                        echo "<p><strong>Cantidad:</strong> {$producto['CANTIDAD']}</p>";
                        echo "<form method='GET' action='/reposteria/controlador/controladorCarrito.php'>";
                        echo "<input type='hidden' name='id_producto' value='{$producto['ID_PRODUCTO']}'>";
                        echo "<button type='submit' name='eliminar' class='btn btn-primary'>Eliminar</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<p>Error: ID del producto no encontrado.</p>";
                    }
                }
            } else {
                echo "<p>No hay productos en tu carrito.</p>";
            }
            ?>

        </div>
        <button type='submit' name='Regresar' onclick="location.href='/reposteria/Controlador/ControladorBuscarProducto.php'" class='btn btn-primary'>Regregar</button>
    </div>


</body>
    <?php
    require_once("../vista/piepagina.php");
    ?>
</html>