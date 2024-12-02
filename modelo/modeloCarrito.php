<?php
require_once $_SERVER['DOCUMENT_ROOT']."/reposteria/config/connect_db.php";

class modeloCarrito {
    private $db;

    public function __construct() {
        $this->db = Conectar::conexion();
    }

    // Agregar producto al carrito (sin usuario)
    public function agregarAlCarrito($id_producto, $cantidad) {
        // Verificar si el producto existe en la tabla producto
        $sql_check = "SELECT COUNT(*) as total FROM producto WHERE ID_PRODUCTO = ?";
        $stmt_check = $this->db->prepare($sql_check);
        $stmt_check->bind_param("i", $id_producto);
        $stmt_check->execute();
        $resultado_check = $stmt_check->get_result()->fetch_assoc();
    
        if ($resultado_check['total'] > 0) {
            echo "El producto con ID: $id_producto existe.<br>"; // Depuración
    
            // Verificar si el producto ya está en el carrito
            $sql = "SELECT * FROM carrito WHERE ID_PRODUCTO = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $id_producto);
            $stmt->execute();
            $resultado = $stmt->get_result();
    
            if ($resultado->num_rows > 0) {
                echo "El producto ya está en el carrito, actualizando cantidad...<br>"; // Depuración
    
                // Actualizar cantidad si ya existe
                $sql = "UPDATE carrito SET CANTIDAD = CANTIDAD + ? WHERE ID_PRODUCTO = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("ii", $cantidad, $id_producto);
            } else {
                echo "El producto no está en el carrito, agregando nuevo...<br>"; // Depuración
    
                // Insertar nuevo producto en el carrito
                $sql = "INSERT INTO carrito (ID_PRODUCTO, CANTIDAD) VALUES (?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("ii", $id_producto, $cantidad);
            }
    
            if ($stmt->execute()) {
                echo "Producto agregado/actualizado correctamente en el carrito.<br>"; // Depuración
            } else {
                echo "Error al agregar/actualizar el producto en el carrito: " . $stmt->error . "<br>"; // Depuración
            }
        } else {
            echo "El producto con ID: $id_producto no existe en la base de datos.<br>"; // Depuración
        }
    }
    
    

    // Obtener los productos del carrito
    public function obtenerCarrito() {
        $sql = "SELECT p.ID_PRODUCTO, p.NOMBRE, p.DESCRIPCION, p.COSTO, c.CANTIDAD, p.IMAGEN 
                FROM carrito c 
                JOIN producto p ON c.ID_PRODUCTO = p.ID_PRODUCTO";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        $productos = [];
        while ($row = $resultado->fetch_assoc()) {
            $productos[] = $row;
        }
        return $productos;
    }
    
    
    // Eliminar producto del carrito
    public function eliminarDelCarrito($id_producto) {
        $sql = "DELETE FROM carrito WHERE ID_PRODUCTO = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();
    }
}
?>
