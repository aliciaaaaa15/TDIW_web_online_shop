<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include_once __DIR__."/../modelo/m_conectarBD.php";
include_once __DIR__."/../modelo/m_producto_concreto.php";

include_once __DIR__."/../modelo/m_carrito.php";
$con = conectarBD();
list($carrito, $total) = construirCarrito($con);

include __DIR__."/../vista/v_carrito_lateral.php";
?>