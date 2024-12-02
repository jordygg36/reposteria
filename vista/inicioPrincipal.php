<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastelería Dulce Encanto</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/reposteria/css/base.css" rel="stylesheet" type="text/css">
    <link href="/reposteria/css/inicioPrincipal.css" rel="stylesheet" type="text/css">
</head>
<?php
require_once("navbar.php");
?>

<body>


    <?php
    require_once("carru.php")
    ?>


    <section>
        <h2>Productos Destacados</h2>
        <div>
            <?php
            require_once("productoInicio.php");
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Pastelería Dulce Encanto. Todos los derechos reservados.</p>
    </footer>

</body>
<?php
require_once("piepagina.php");
?>

</html>