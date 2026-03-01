<?php
    function getUserDatos($con, int $id_user) {
        $query = "SELECT * FROM Cliente WHERE id = $1"; 
        $result = pg_query_params($con, $query, array($id_user)); 
        if (!$result || pg_num_rows($result) === 0) { 
            return null; 
        } 
        return pg_fetch_assoc($result);
    }

    function actualizarPerfil($con, $datos) {
        $sql = "UPDATE cliente 
                SET nombre = $1, email = $2, direccion = $3, poblacion = $4, cp = $5 
                WHERE id = $6";

        $params = [
            $datos['nombre'],
            $datos['email'],
            $datos['direccion'],
            $datos['poblacion'],
            $datos['codigo_postal'],
            $datos['id']
        ];

        $res = pg_query_params($con, $sql, $params);
        var_dump(pg_last_error($con));
        var_dump(pg_affected_rows($res));

        if (!$res) return false; 
        
        // Si no se modificó ninguna fila → false 
        return pg_affected_rows($res) > 0;
    }

?>