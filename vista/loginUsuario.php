<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Repostería</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container" style="margin-top:10%;">
        <form method="post" style="background:#f8f8f8; border: 1px solid #ccc; padding:20px; border-radius:10px;">
            <div class="text-center">
                <h3>Bienvenido a la Pastelería</h3>
                <p>Por favor, inicia sesión para continuar.</p>
            </div>
            <hr>
            <div class="mb-3">
                <label for="txt_correo" class="form-label">Correo Electrónico:</label>
                <input type="email" id="txt_correo" name="txt_correo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="txt_pass" class="form-label">Contraseña:</label>
                <input type="password" id="txt_pass" name="txt_pass" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" name="btn_aceptar" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['btn_aceptar'])) {
        $email = $_POST['txt_correo'];
        $contrasena = $_POST['txt_pass'];

        $modeloLogin = new modeloLoginUsuario();
        $modeloLogin->validar_usuario($email, $contrasena);
    }
    ?>
</body>
</html>
