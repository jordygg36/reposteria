<?php
class modeloDetalleTicket {
    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function insertarDetalleTicket($id_producto, $cantidad, $precio_unitario){
        // Calcular el precio total
        $precio_total = $cantidad * $precio_unitario;

        // Preparar la consulta SQL para insertar los datos en detalle_ticket
        $sql = "INSERT INTO detalle_ticket (ID_PRODUCTO, CANTIDAD, PRECIO_UNITARIO, PRECIO_TOTAL) 
                VALUES (?, ?, ?, ?)";

        if ($stmt = $this->db->prepare($sql)) {
            // Vincular los parámetros
            $stmt->bind_param("iiid", $id_producto, $cantidad, $precio_unitario, $precio_total);

            // Ejecutar la consulta
            $stmt->execute();
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Error al preparar la consulta: " . $this->db->error . "</div>";
        }
    }
}
?>
