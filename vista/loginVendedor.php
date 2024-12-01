<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Vendedor</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container" style="margin-top:10%;">
        <form method="post" style="background:#f9f9f9; border:1px solid #ddd; padding:20px;">
            <h3 class="text-center">Inicio de Sesión - Vendedor</h3>
            <hr>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="txt_correo" class="form-control" placeholder="Ingrese su correo" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="txt_pass" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
            <button type="submit" name="btn_aceptar" class="btn btn-primary btn-block">Iniciar Sesión</button>
        </form>
        <?php
        if (isset($_POST['btn_aceptar'])) {
            require_once $_SERVER['DOCUMENT_ROOT'] . "/reposteria/modelo/modeloLoginVendedor.php";
            $login = new modeloLoginVendedor();
            $login->validar_vendedor($_POST['txt_correo'], $_POST['txt_pass']);
        }
        ?>
    </div>
</body>
</html>
