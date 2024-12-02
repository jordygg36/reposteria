<?php
require_once $_SERVER['DOCUMENT_ROOT']."/reposteria/modelo/modeloCarrito.php";

// Controlador para agregar producto al carrito
if (isset($_GET['agregar'])) {
    $id_producto = $_GET['id_producto'];
    $cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : 1;  // Si no se pasa cantidad, la cantidad es 1
    error_log("ID_PRODUCTO recibido: " . $id_producto);
    error_log("Cantidad recibida: " . $cantidad);
    $carrito = new modeloCarrito();
    $carrito->agregarAlCarrito($id_producto, $cantidad);
    header("Location: /reposteria/vista/carrito.php");  // Redirige al carrito después de agregar
}

// Controlador para eliminar producto del carrito
if (isset($_GET['eliminar'])) {
    $id_producto = $_GET['id_producto'];

    $carrito = new modeloCarrito();
    $carrito->eliminarDelCarrito($id_producto);
    header("Location: /reposteria/vista/carrito.php");  // Redirige al carrito después de eliminar
}

var_dump($id_producto);
die();

?>
