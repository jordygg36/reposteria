<?php
class modeloPedido {
    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }

    public function insertarPedido($productos){
        // Iniciar la transacción
        $this->db->begin_transaction();

        try {
            // Insertar pedido
            $total = 0;
            $sql = "INSERT INTO pedidos (ID_CLIENTE, FECHA, TOTAL) VALUES (?, NOW(), ?)";
            if ($stmt = $this->db->prepare($sql)) {
                $stmt->bind_param("ii", $_POST['id_cliente'], $total);
                $stmt->execute();
                $pedido_id = $stmt->insert_id; // Obtener el ID del pedido insertado
                $stmt->close();
            }

            // Insertar los productos del detalle de pedido
            foreach ($productos as $producto) {
                $id_producto = $producto['id_producto'];
                $cantidad = $producto['cantidad'];
                $precio_unitario = $producto['precio_unitario'];
                $precio_total = $cantidad * $precio_unitario;

                // Insertar en detalle_pedido
                $sql_detalle = "INSERT INTO detalle_pedido (ID_PEDIDO, ID_PRODUCTO, CANTIDAD, PRECIO_UNITARIO, PRECIO_TOTAL) 
                                VALUES (?, ?, ?, ?, ?)";
                if ($stmt_detalle = $this->db->prepare($sql_detalle)) {
                    $stmt_detalle->bind_param("iiidd", $pedido_id, $id_producto, $cantidad, $precio_unitario, $precio_total);
                    $stmt_detalle->execute();
                    $stmt_detalle->close();
                }

                // Sumar al total
                $total += $precio_total;
            }

            // Actualizar el total del pedido
            $sql_update = "UPDATE pedidos SET TOTAL = ? WHERE ID_PEDIDO = ?";
            if ($stmt_update = $this->db->prepare($sql_update)) {
                $stmt_update->bind_param("di", $total, $pedido_id);
                $stmt_update->execute();
                $stmt_update->close();
            }

            // Commit de la transacción
            $this->db->commit();
            echo "<div class='alert alert-success'>Pedido registrado exitosamente</div>";
        } catch (Exception $e) {
            // Rollback en caso de error
            $this->db->rollback();
            echo "<div class='alert alert-danger'>Error al registrar el pedido: " . $e->getMessage() . "</div>";
        }
    }

    public function obtenerProductos(){
        $sql = "SELECT * FROM productos";
        $result = $this->db->query($sql);
        return $result;
    }
}
?>
