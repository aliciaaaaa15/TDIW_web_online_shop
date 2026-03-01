<?php
    include_once __DIR__."/../modelo/m_conectarBD.php";
    include_once __DIR__."/../modelo/m_producto_concreto.php";

    $con = conectarBD();

    $idProducto = $_GET['idProducto'] ?? null;
    if (!$idProducto || !is_numeric($idProducto)) {
        echo "Producto no válido";
        exit;
    }

    $producto = loadProducto($con, $idProducto);

    include_once __DIR__."/../vista/v_detalles_producto.php";
?>
