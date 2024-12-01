<?php
class modeloLoginUsuario {
    private $db;

    public function __construct() {
        $this->db = Conectar::conexion(); // Conexión a la base de datos
    }

    public function validar_usuario($email, $contrasena) {
        $bd = new bd();
        $sql = "SELECT ID_USUARIO, NOMBRE, APELLIDO FROM usuarios WHERE EMAIL = '$email' AND CONTRASENA = '$contrasena'";
        $existe = $bd->existeRegistro($sql); // Verifica si existe el usuario
        $resultado = $bd->ejecutarConsulta($sql);

        if ($existe == 1) {
            // Usuario válido: obtenemos su información
            $fila = $resultado->fetch_assoc();
            $id_usuario = $fila['ID_USUARIO'];
            $nombre = $fila['NOMBRE'];
            $apellido = $fila['APELLIDO'];

            // Redirigir al menú con los datos del usuario
            echo "<meta http-equiv=\"refresh\" content=\"0; url=/reposteria/vista/menu.php?id_usuario=$id_usuario&nombre=$nombre&apellido=$apellido\">";
        } else {
            // Usuario no válido
            echo "<div class='row'>".
                "<div class='col-md-12' style='background:red; color:white; text-align:center;'>".
                "Correo Electrónico o Contraseña Incorrecta".
                "</div>".
                "</div>";
        }
    }
}
?>
