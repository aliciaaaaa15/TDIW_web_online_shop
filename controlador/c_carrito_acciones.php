<?php
session_start();
include_once __DIR__."/../modelo/m_conectarBD.php";
include_once __DIR__."/../modelo/m_producto_concreto.php";

$con = conectarBD();

$accion = $_POST['accion'] ?? 'add';
$idProducto = isset($_POST['idProducto']) ? intval($_POST['idProducto']) : null;
$cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 1;

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

switch ($accion) {

    case 'add':
        if ($idProducto) {
            if (isset($_SESSION['carrito'][$idProducto])) {
                $_SESSION['carrito'][$idProducto] += $cantidad;
            } else {
                $_SESSION['carrito'][$idProducto] = $cantidad;
            }
        }
        break;

    case 'remove':
        if ($idProducto && isset($_SESSION['carrito'][$idProducto])) {
            unset($_SESSION['carrito'][$idProducto]);
        }
        break;

    case 'update':
        if ($idProducto && isset($_POST['cambio'])) { 
            $cambio = intval($_POST['cambio']); 
            if (isset($_SESSION['carrito'][$idProducto])) { 
                $nuevaCantidad = $_SESSION['carrito'][$idProducto] + $cambio; 
                if ($nuevaCantidad <= 0) {
                    // eliminar producto 
                    unset($_SESSION['carrito'][$idProducto]); 
                } 
                else { 
                    // actualizar cantidad 
                    $_SESSION['carrito'][$idProducto] = $nuevaCantidad; 
                } 
            } 
        } break;

    case 'erase':
        unset($_SESSION['carrito']);
        break;

}

// devolver vista del carrito
//include __DIR__."/../vista/v_carrito_lateral.php";
echo json_encode(['ok' => true]); exit;