<?php
require_once $_SERVER['DOCUMENT_ROOT']."/reposteria/modelo/modeloCarrito.php";

// Controlador para agregar producto al carrito
if (isset($_POST['agregar'])) {
    $id_usuario = 1;  // Asegúrate de obtener el id del usuario logueado
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    $carrito = new modeloCarrito();
    $carrito->agregarAlCarrito($id_usuario, $id_producto, $cantidad);
    header("Location: /reposteria/vista/carrito.php");  // Redirige al carrito después de agregar
}

// Controlador para eliminar producto del carrito
if (isset($_POST['eliminar'])) {
    $id_usuario = 1;  // Asegúrate de obtener el id del usuario logueado
    $id_producto = $_POST['id_producto'];

    $carrito = new modeloCarrito();
    $carrito->eliminarDelCarrito($id_usuario, $id_producto);
    header("Location: /reposteria/vista/carrito.php");  // Redirige al carrito después de eliminar
}
?>
