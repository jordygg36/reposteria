<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pie de Página Sofisticado</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        /* Estilos del pie de página */
        .footer {
            background-color: #333; /* Color de fondo */
            color: #fff; /* Color de texto */
            padding: 40px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .footer .footer-section {
            flex: 1;
            margin: 10px;
            min-width: 250px;
        }

        .footer h4 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #f39c12;
            text-transform: uppercase;
        }

        .footer p,
        .footer a {
            font-size: 14px;
            color: #ccc;
            line-height: 1.6;
            text-decoration: none;
        }

        .footer a:hover {
            color: #f39c12;
            text-decoration: underline;
        }

        .footer .social-icons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .footer .social-icons a {
            color: #fff;
            background-color: #444;
            padding: 10px;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
        }

        .footer .social-icons a:hover {
            background-color: #f39c12;
            transform: scale(1.1);
        }

        .footer .copy {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #bbb;
        }

        /* Estilo adaptable */
        @media (max-width: 768px) {
            .footer {
                flex-direction: column;
                text-align: center;
            }

            .footer .footer-section {
                margin-bottom: 20px;
            }

            .footer .social-icons {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Pie de página -->
    <footer class="footer">
        <!-- Sección de contacto -->
        <div class="footer-section">
            <h4>Contacto</h4>
            <p>Teléfono: +52 555-123-4567</p>
            <p>Email: contacto@reposteria.com</p>
            <p>Dirección: Calle Dulce, 123, Ciudad Pastel</p>
        </div>

        <!-- Sección de enlaces rápidos -->
        <div class="footer-section">
            <h4>Enlaces rápidos</h4>
            <a href="#">Inicio</a><br>
            <a href="#">Menú</a><br>
            <a href="#">Buscar Producto</a><br>
            <a href="#">Contáctanos</a>
        </div>

        <!-- Sección de redes sociales -->
        <div class="footer-section">
            <h4>Síguenos</h4>
            <div class="social-icons">
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/facebook-new.png" alt="Facebook"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/twitter.png" alt="Twitter"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/instagram-new.png" alt="Instagram"></a>
                <a href="#"><img src="https://img.icons8.com/ios-filled/24/linkedin.png" alt="LinkedIn"></a>
            </div>
        </div>
    </footer>

    <div class="footer copy">
        <p>&copy; 2024 Repostería. Todos los derechos reservados.</p>
    </div>
</body>
</html>
