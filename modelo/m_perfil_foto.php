<?php
    function actualizar_imagen_cliente($conn, $idCliente, $nombreArchivo) {
        $query = "UPDATE Cliente SET img_perfil = $1 WHERE id = $2";
        pg_query_params($conn, $query, [$nombreArchivo, $idCliente]);
    }


?>  