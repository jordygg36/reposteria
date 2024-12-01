<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastelería Dulce Encanto</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <?php
    require_once("navbar.php");
    ?>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #fff5e6;
        }

        /* Estilo del encabezado */
        .header {
            background-image: url('https://via.placeholder.com/1920x600'); /* Imagen de cabecera */
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 100px 20px;
        }

        .header h1 {
            font-size: 48px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .header p {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .header a {
            background-color: #f39c12;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
        }

        .header a:hover {
            background-color: #d87f05;
        }

        /* Estilo de la sección de productos destacados */
        .featured {
            padding: 50px 20px;
            text-align: center;
        }

        .featured h2 {
            font-size: 36px;
            margin-bottom: 30px;
            color: #444;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 250px;
            text-align: center;
            padding: 15px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .product-card h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .product-card p {
            font-size: 14px;
            color: #777;
        }

        .product-card a {
            background-color: #f39c12;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .product-card a:hover {
            background-color: #d87f05;
        }

        /* Estilo del pie de página */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>

<body>
<?php
    require_once("navbar.php");
    ?>
    <!-- Encabezado -->
    <header class="header">
        <h1>Bienvenidos a Dulce Encanto</h1>
        <p>Delicias que endulzan tu día</p>
        <a href="#">Explorar Menú</a>
    </header>

    <!-- Productos destacados -->
    <section class="featured">
        <h2>Productos Destacados</h2>
        <div class="products">
            <div class="product-card">
                <img src="https://via.placeholder.com/250" alt="Pastel de Chocolate">
                <h3>Pastel de Chocolate</h3>
                <p>Un clásico irresistible para los amantes del chocolate.</p>
                <a href="#">Ordenar Ahora</a>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250" alt="Tarta de Fresa">
                <h3>Tarta de Fresa</h3>
                <p>Fresas frescas con la suavidad de nuestra crema.</p>
                <a href="#">Ordenar Ahora</a>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/250" alt="Cupcakes">
                <h3>Cupcakes</h3>
                <p>Pequeñas porciones de felicidad en cada bocado.</p>
                <a href="#">Ordenar Ahora</a>
            </div>
        </div>
    </section>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 Pastelería Dulce Encanto. Todos los derechos reservados.</p>
    </footer>

</body>
<?php
    require_once("piepagina.php");
    ?>
</html>
