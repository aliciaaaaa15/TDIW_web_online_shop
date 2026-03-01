<?php
    function getComprasUsuario($con, int $idUsuario) {
        $query = "
            SELECT 
                p.id AS pedido_id,
                p.fecha,
                p.importetotal,
                lp.cantidad,
                lp.subtotal,
                pr.nombre AS nombre_producto,
                pr.precio AS precio_unitario,
                pr.imagen
            FROM pedido p
            JOIN liniapedido lp ON p.id = lp.idpedido
            JOIN producto pr ON lp.idproducto = pr.id
            WHERE p.idusuario = $1
            ORDER BY p.fecha DESC
        ";

        $result = pg_query_params($con, $query, [$idUsuario]);

        if (!$result) {
            error_log('Error al obtener historial: ' . pg_last_error($con));
            return [];
        }

        $historial = [];
        while ($row = pg_fetch_assoc($result)) {
            $historial[] = $row;
        }

        return $historial;
    }
?>
