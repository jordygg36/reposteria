<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="../fuentes/icons-1.8.3/font/bootstrap-icons.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegación</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilos de la barra de navegación */
        .navbar {
            background-color: #333;
            /* Color de fondo */
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar a:hover {
            background-color: #575757;
            /* Color de fondo al pasar el mouse */
            color: #fff;
            /* Color del texto al pasar el mouse */
        }

        /* Estilo para el logo */
        .navbar .logo {
            font-size: 20px;
            font-weight: bold;
        }

        /* Enlaces alineados a la derecha */
        .navbar .links {
            display: flex;
        }

        /* Adaptable a dispositivos móviles */
        @media screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: center;
            }

            .navbar .links {
                flex-direction: column;
                width: 100%;
                text-align: center;
            }

            .navbar a {
                width: 100%;
                padding: 10px 0;
            }
        }
        .iconos{
            font-size: 2rem;
            color: blue;

        }
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <div class="navbar">
        <a href="#" class="logo">Repostería</a>
        <div class="links">
            <a href="../vista/inicioPrincipal.php">Inicio</a>
            <a href="/reposteria/controlador/controladorBuscarProducto.php">Menu</a>
            <a href="/reposteria/controlador/controladorLoginVendedor.php">Iniciar secion</a>
            <div class="icon">
                <i class="bi bi-cart4 iconos"></i>
            </div>
        </div>
    </div>

</body>

</html>