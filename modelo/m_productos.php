<?php
    function getProductosPorCategoria($con, $idCategoria, $limit = 20){
    $query = "SELECT p.*, c.categoria, c.descripcion, pr.valor AS promo_valor, pr.descuento AS promo_texto
              FROM Producto p 
              JOIN Categoria c ON c.id = p.idCategoria 
              LEFT JOIN Promocion pr ON pr.id = p.id_promocion
              WHERE c.id = $1 AND p.disponible = true
              ORDER BY p.id ASC LIMIT $2";
    $result = pg_query_params($con, $query, array($idCategoria, $limit));
    return pg_fetch_all($result);
    }

    function buscarProductos($con, $texto, $limit = 20){
        $query = "SELECT p.*, pr.valor AS promo_valor, pr.descuento AS promo_texto
        FROM Producto p
                LEFT JOIN Promocion pr ON pr.id = p.id_promocion
                WHERE nombre ILIKE $1 AND p.disponible = true
                ORDER BY id ASC LIMIT $2";
        $result = pg_query_params($con, $query, array("%$texto%", $limit));
        return pg_fetch_all($result);
    }

    function getTodosLosProductos($con, $limit = 20){
        $query = "SELECT p.*, pr.valor AS promo_valor, pr.descuento AS promo_texto
        FROM Producto p
                LEFT JOIN Promocion pr ON pr.id = p.id_promocion
                WHERE p.disponible = true 
                ORDER BY id ASC LIMIT $1";
        $result = pg_query_params($con, $query, array($limit));
        return pg_fetch_all($result);
    }

    function loadProductosPromo($con){
        $query = "SELECT pd.*, pm.valor AS promo_valor, pm.descuento AS promo_texto
        FROM producto pd, promocion pm 
            WHERE pd.id_promocion = pm.id 
            ORDER BY pm.valor DESC LIMIT 6";
        $result = pg_query($con, $query) or die("Error SQL query promo");
        return pg_fetch_all($result);
    }
?>