<?php
class modeloLoginUsuario{
    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();  // Asegúrate de que la clase Conectar tenga la conexión a la base de datos.
    }

    public function validar_usuario($email, $contrasena){
        // Verificamos que la conexión a la base de datos sea válida
        if ($this->db) {
            // Preparar la consulta SQL
            $sql = "SELECT * FROM usuario WHERE email = ? AND contrasena = ?";
            $stmt = $this->db->prepare($sql);

            if ($stmt) {
                // Vincular los parámetros de forma segura
                $stmt->bind_param("ss", $email, $contrasena);  // "ss" indica que ambos parámetros son strings

                // Ejecutar la consulta
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows > 0) {
                    // Si el usuario existe, redirigir a la página de inicioPrincipal.php
                    $usuario = $resultado->fetch_assoc();
                    $id_usuario = $usuario['ID_USUARIO'];

                    // Redirigir a la página de inicio
                    header("Location: /reposteria/vista/inicioPrincipal.php?id_usuario=$id_usuario");
                    exit(); // Asegurarse de que el script se detenga después de la redirección
                } else {
                    // Si las credenciales son incorrectas
                    echo "<div class='alert alert-danger'>Correo Electrónico o Contraseña Incorrecta</div>";
                }

                // Cerrar la declaración
                $stmt->close();
            } else {
                // Si hay un error con la consulta
                echo "<div class='alert alert-danger'>Error en la preparación de la consulta.</div>";
            }
        } else {
            // Si no se pudo conectar a la base de datos
            echo "<div class='alert alert-danger'>Error de conexión a la base de datos.</div>";
        }
    }
}
?>
