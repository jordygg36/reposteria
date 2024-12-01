<?php
class bd {
    public function __construct() {
        $this->db = Conectar::conexion();

        if ($this->db === null) {
            throw new Exception("No se pudo conectar a la base de datos.");
        }
    }

    public function existeRegistro($sql) {
        $resultado = $this->db->query($sql);
        return $resultado->num_rows > 0 ? 1 : 0;
    }

    public function abc($sql) {
        if ($this->db->query($sql) == TRUE) {
            echo "Se ha realizado el cambio solicitado"; 
        } else {
            echo "Error: no se ha ejecutado ningun cambio";
        }
        $this->db->close();
    }

    public function mostrarCampo($sql, $campo) {
        $resultado = $this->db->query($sql);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                return $row[$campo];
            }
        }
        return "vacio";
    }

    public function combo($sql, $id, $des) {
        $resultado = $this->db->query($sql);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo '<option value="' . $row[$id] . '">' . $row[$des] . '</option>';
            }
        }
    }
}
?>
