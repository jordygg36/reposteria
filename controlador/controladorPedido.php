<?php
// Incluir archivos de configuración y modelo una sola vez
require_once $_SERVER['DOCUMENT_ROOT'] . "/reposteria/config/connect_db.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/reposteria/config/BD.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/reposteria/modelo/modeloPedido.php";

// Instanciar el modelo
$modeloPedido = new modeloPedido();

// Incluir la vista
require_once $_SERVER['DOCUMENT_ROOT'] . "/reposteria/vista/pedido.php";
?>
