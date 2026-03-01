<?php
    include_once __DIR__."/../modelo/m_conectarBD.php";

    include_once __DIR__."/../modelo/m_compras.php";
    $con = conectarBD();
    $historial = getComprasUsuario($con, $_SESSION['id']);

    $agrupado = [];

    foreach ($historial as $linea) {
        $id = $linea['pedido_id'];

        if (!isset($agrupado[$id])) {
            $agrupado[$id] = [
                'fecha' => $linea['fecha'],
                'total' => $linea['importetotal'],
                'productos' => []
            ];
        }

        $agrupado[$id]['productos'][] = [
            'nombre' => $linea['nombre_producto'],
            'cantidad' => $linea['cantidad'],
            'subtotal' => $linea['subtotal']
        ];
    }



    include_once __DIR__."/../vista/v_compras.php";
?>