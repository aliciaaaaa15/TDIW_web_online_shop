<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include_once __DIR__."/../modelo/m_conectarBD.php";
include_once __DIR__."/../modelo/m_producto_concreto.php";
include_once __DIR__."/../modelo/m_guardar_compra.php";

if (!isset($_SESSION['id'])) {
    echo "USUARIO_NO_LOGUEADO";
    exit;
}

$con = conectarBD();
$carritoSesion = $_SESSION['carrito'] ?? [];

if (empty($carritoSesion)) {
    echo "CARRITO_VACIO";
    exit;
}

$carrito = [];
$totalDinero = 0;
$totalItems = 0;

foreach ($carritoSesion as $idProducto => $cantidad) {
    $producto = loadProducto($con, $idProducto);
    if (!$producto) continue;

    $precio = $producto['precio'];
    if (!empty($producto['promo_valor'])) {
        $precio = round($precio * (1 - $producto['promo_valor'] / 100), 2);
    }

    $subtotal = $precio * $cantidad;
    $totalDinero += $subtotal;
    $totalItems += $cantidad;

    $carrito[] = [
        'id' => $idProducto,
        'nombre' => $producto['nombre'],
        'precio' => $precio,
        'cantidad' => $cantidad,
        'subtotal' => $subtotal
    ];
}

$idPedido = guardarCompraCompleta($con, $_SESSION['id'], $totalItems, $totalDinero, $carrito);

if ($idPedido) {
    unset($_SESSION['carrito']); 
    $resumenPedido = [
        'id' => $idPedido,
        'total' => $totalDinero,
        'items' => $carrito
    ];
    require __DIR__."/../vista/v_confirmacion_compra.php";
} else {
    echo "ERROR_DATABASE";
}
?>