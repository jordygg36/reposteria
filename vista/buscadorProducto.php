<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Productos</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/reposteria/css/base.css" rel="stylesheet" type="text/css">
    <link href="/reposteria/css/buscadorProducto.css" rel="stylesheet" type="text/css">
    <?php
    require_once("navbar.php");
    ?>
    
</head>
<?php
require_once("navbar.php");
?>

<body>
    <div class="container">
        <!-- Contenedor del buscador -->
        <div class="search-container">
            <h3 class="text-center">Buscador de Productos</h3>
            <form method="post">
                <input class="form-control mb-3" name="txt_criterio" type="text" placeholder="Escribe el nombre del producto" autofocus>
                <div class="text-center">
                    <button name="btn_buscar" type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>

        <!-- Contenedor de los productos -->
        <div>
            <?php
            if (isset($_POST["btn_buscar"])) {
                $productos = new modeloBuscadorProducto();
                $data["productos"] = $productos->resultadosProductos();

                echo "<div class='product-container'>";

                foreach ($data["productos"] as $dato) {
                    $id_producto = $dato['ID_PRODUCTO'];
                    $nombre = $dato['NOMBRE'];
                    $descripcion = $dato['DESCRIPCION'];
                    $costo = $dato['COSTO'];
                    $imagen = $dato['IMAGEN']; // Obtenemos el nombre de la imagen

                    echo "<div class='product-card'>";
                    echo "<img src='/reposteria/img/menu/$imagen' alt='Imagen del Producto'>";
                    echo "<h5>$nombre</h5>";
                    echo "<p>$descripcion</p>";
                    echo "<p><strong>Costo:</strong> $$costo</p>";
                    echo "<button class='btn btn-primary' onclick=\"location.href='/reposteria/controlador/controladorCarrito.php?agregar=true&id_producto=" . $id_producto . "&cantidad=1'\">Comprar</button>";

                    echo "</div>";
                }

                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
<?php
require_once("piepagina.php");
?>

</html>