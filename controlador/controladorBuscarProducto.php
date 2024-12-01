<?php
require_once $_SERVER['DOCUMENT_ROOT']."/reposteria/config/connect_db.php";
require_once $_SERVER['DOCUMENT_ROOT']."/reposteria/config/BD.php";
require_once $_SERVER['DOCUMENT_ROOT']."/reposteria/modelo/modeloBuscadorProducto.php";

$productos = new modeloBuscadorProducto();
require_once $_SERVER['DOCUMENT_ROOT']."/reposteria/vista/buscadorProducto.php";
?>
