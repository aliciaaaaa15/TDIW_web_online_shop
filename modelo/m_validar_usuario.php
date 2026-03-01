<?php
function validarUsuario($con, string $email, string $password, &$user): bool {
    // Consulta segura usando parámetros
    $email_escaped = pg_escape_string($con, $email);
    $query = "SELECT * FROM Cliente WHERE email = $1 ";
    $result = pg_query_params($con, $query, array($email_escaped)) or die("Error SQL query");

    // Si hay al menos una fila, el usuario es válido
    if (pg_num_rows($result) > 0 ) {
        $row = pg_fetch_assoc($result);
        // si la contraseña es igual 
        if(password_verify($password,$row['password']) ){
            $user = [
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'img_perfil' => $row['img_perfil']
            ];
            return true;
        }
    } 
    return false;
}
?>
