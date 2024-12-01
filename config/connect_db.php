<?php
class Conectar {
    public static function conexion() {
        $servidor = "localhost";
        $password = "";
        $bd = "reposteria";  // Nombre de la base de datos
        $usuario = "root";

        $link = new MySQLi($servidor, $usuario, $password, $bd);

        if (mysqli_connect_errno()) {
            echo "Conexión Fallida...";
            return null;
        }
        return $link;
    }
}
?>
