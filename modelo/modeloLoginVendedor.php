<?php
class modeloLoginVendedor{
    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();  // Asegúrate de que la clase Conectar tenga la conexión a la base de datos.
    }

    public function validar_vendedor($email, $contrasena){
        // Verificamos que la conexión a la base de datos sea válida
        if ($this->db) {
            // Preparar la consulta SQL
            $sql = "SELECT * FROM vendedor WHERE correo = ? AND contrasena = ?";
            if ($stmt = $this->db->prepare($sql)) {
                // Vincular los parámetros de forma segura
                $stmt->bind_param("ss", $email, $contrasena);  // "ss" indica que ambos parámetros son strings

                // Ejecutar la consulta
                $stmt->execute();
                $resultado = $stmt->get_result();

                if ($resultado->num_rows > 0) {
                    // Si el vendedor existe, redirigir a la página de inicioPrincipal.php
                    $vendedor = $resultado->fetch_assoc();
                    $id_vendedor = $vendedor['ID_VENDEDOR'];

                    // Redirigir a la página de inicio
                    header("Location: /reposteria/controlador/controladorDetalleTicket.php?id_vendedor=$id_vendedor");
                    exit(); // Asegurarse de que el script se detenga después de la redirección
                } else {
                    // Si las credenciales son incorrectas
                    echo "<div class='alert alert-danger'>Correo Electrónico o Contraseña Incorrecta</div>";
                }

                // Cerrar la declaración
                $stmt->close();
            } else {
                // Si hay un error con la preparación de la consulta
                echo "<div class='alert alert-danger'>Error en la preparación de la consulta: " . $this->db->error . "</div>";
            }
        } else {
            // Si no se pudo conectar a la base de datos
            echo "<div class='alert alert-danger'>Error de conexión a la base de datos.</div>";
        }
    }
}
?>
