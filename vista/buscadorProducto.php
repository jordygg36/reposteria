<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Productos</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <?php
    require_once("../vista/navbar.php");
    ?>
    <style>
        /* Contenedor principal */
        body {
            position: relative;
            font-family: Arial, sans-serif;
            color: #333;
            height: 100vh; /* Asegura que ocupe toda la pantalla */
            margin: 0;
            overflow-x: hidden; /* Evitar desplazamiento horizontal */
        }

        /* Overlay para la imagen de fondo */
        body::before {
            content: "";
            position: fixed; /* Hace que la imagen de fondo se quede fija */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../img/findo15 - copia.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover;
            background-position: center;
            opacity: 0.5; /* Opacidad de la imagen de fondo */
            z-index: -1; /* Asegura que el contenido esté encima */
        }

        /* Estilo del contenedor de búsqueda */
        .search-container {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para el buscador */
            border: 1px solid #CBCBCB;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product-card {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #6496CC;
            border: none;
        }

        .btn-primary:hover {
            background-color: #537ca6;
        }
    </style>
</head>
<?php
    require_once("../vista/navbar.php");
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
                    echo "<button class='btn btn-primary'>Comprar</button>";
                    echo "</div>";
                }
                
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
    <?php
    require_once("../vista/piepagina.php");
    ?>
</html>
