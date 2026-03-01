<?php
    function loadProducto($con, $idProducto){
        $query =  "SELECT p.*, pr.descuento AS promo_texto, pr.valor AS promo_valor FROM Producto p 
                LEFT JOIN Promocion pr ON pr.id = p.id_promocion 
                WHERE p.id = $1 AND p.disponible = true";
        $result = pg_query_params($con, $query, array($idProducto)) or die("Error SQL query");
        $producto = pg_fetch_assoc($result);
        return (!$producto)? false: $producto;
    }
?>