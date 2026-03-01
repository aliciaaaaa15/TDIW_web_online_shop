<?php
function guardarCompraCompleta($con, $idUsuario, $totalItems, $totalDinero, $items){

    $sqlPedido = "INSERT INTO pedido (idusuario, nelementos, importetotal) VALUES ($1, $2, $3) RETURNING id";
    $resPedido = pg_query_params($con, $sqlPedido, array($idUsuario, $totalItems, $totalDinero)) or die("Error SQL query");
    $res = pg_fetch_assoc($resPedido);
    $idPedido = $res['id'];

    foreach ($items as $item){
        $sqlLinia = "INSERT INTO liniapedido (idpedido, idproducto, cantidad, preciounitario, subtotal) VALUES ($1, $2, $3, $4, $5)";
        pg_query_params($con, $sqlLinia, array($idPedido, $item['id'], $item['cantidad'], $item['precio'], $item['subtotal']));
    }
    return $idPedido;
}
?>