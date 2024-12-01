<html>
<head>
    <title>Login</title>
    <link href="/reposteria/framework/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body> 
    <div class="container" style="margin-top:10%;">
        <form method="post" style="background:#EEEEEE; border: 1px solid #616161; padding:20px;">
            <div class="row">
                <div class="col-md-12" style="text-align:center;">
                    <h3>BIENVENIDO AL SISTEMA DE REPONTERÍA</h3>
                </div>
            </div>
            <hr>
            <!-- Campo de correo electrónico -->
            <div class="row" style="padding-bottom:20px;">
                <div class="col-md-2">
                    <label class="form-label">Correo:</label>
                </div>
                <div class="col-md-10">
                    <input class="form-control" type="email" name="txt_correo" minlength="16" maxlength="30" placeholder="Ingrese un correo">
                </div>                
            </div>     
            <!-- Campo de contraseña -->
            <div class="row">
                <div class="col-md-2">
                    <label class="form-label">Password:</label>
                </div>
                <div class="col-md-10">
                    <input class="form-control" type="password" name="txt_pass" minlength="4" maxlength="4" placeholder="Ingrese un pass">
                </div>                
            </div>  
            <hr>
            <div class="row">
                <div class="col-md-12" style="text-align:center;">
                    <input class="btn btn-primary" type="submit" name="btn_aceptar" value="Aceptar" style="width:150px;">
                </div>                
            </div>                         
        </form>
    </div>

    <?php
        if(isset($_POST["btn_aceptar"])){
            // Obtener los valores del formulario
            $email = $_POST["txt_correo"];
            $contrasena = $_POST["txt_pass"];
            
            // Crear el objeto modelo y validar el usuario
            $validacion = new modeloLoginUsuario();
            $validacion->validar_usuario($email, $contrasena);
        }
    ?>

</body>
</html>
