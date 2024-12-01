<?php
class modeloBuscadorProducto {
    public function __construct() {
        $this->db = Conectar::conexion();
        $this->productos = array();
    }

    public function resultadosProductos() {
        $parametro = $_POST["txt_criterio"];
        // Modificar la consulta para traer la columna de imagen
        $sql = "SELECT * FROM producto WHERE CONCAT(NOMBRE, DESCRIPCION, COSTO) LIKE '%$parametro%'";
        $resultado = $this->db->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $this->productos[] = $row;
            }
        } else {
            echo "No hay resultados";
        }

        return $this->productos;
    }
}
?>
