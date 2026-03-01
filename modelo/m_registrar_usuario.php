<?php
function registrarUsuarioBD($con, string $name, string $email, string $password, string $direccion, string $poblacion, string $codigoPostal){

    // Validar email
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Error: Email inválido');</script>";
        return false;
    }

    // Validar código postal
    if(!filter_var($codigoPostal,FILTER_VALIDATE_INT)){
        echo "<script>alert('Error: Código postal inválido');</script>";
        return false;
    }

    // Validar password
    $pattern_password="/^[A-Za-z0-9]+$/";
    if(!filter_var($password,FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $pattern_password)))){
        echo "<script>alert('Error: Contraseña inválida');</script>";
        return false;
    }

    // Validar dirección
    $pattern_direccion="/^[A-Za-zÀ-ÖØ-öø-ÿ 0-9]{0,30}$/";
    if(!filter_var($direccion,FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $pattern_direccion)))){
        echo "<script>alert('Error: Dirección inválida');</script>";
        return false;
    }

    // Validar población
    $pattern_poblacion="/^[A-Za-zÀ-ÖØ-öø-ÿ 0-9]{0,30}$/";
    if(!filter_var($poblacion,FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $pattern_poblacion)))){
        echo "<script>alert('Error: Población inválida');</script>";
        return false;
    }

    // Validar nombre
    $pattern_name="/^[A-Za-zÀ-ÖØ-öø-ÿ ]+$/";
    if(!filter_var($name,FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => $pattern_name)))){
        echo "<script>alert('Error: Nombre inválido');</script>";
        return false;
    }

    // Comprobar si el email ya está registrado
    $query = "SELECT * FROM Cliente WHERE email=$1";
    $email_escaped = pg_escape_string($con, $email);
    $result_query = pg_query_params($con, $query, array($email_escaped)) or die("Error SQL query");
    
    if(pg_num_rows($result_query) > 0){
        echo "<script>alert('Error: El email ya está en uso');</script>";
        return false;
    }

    // Insertar usuario
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $query_insert = "INSERT INTO Cliente (nombre, email, password, direccion, poblacion, cp) VALUES ($1, $2, $3, $4, $5, $6) RETURNING id";
    $result = pg_query_params($con, $query_insert, array($name, $email_escaped, $passwordHash, $direccion, $poblacion, $codigoPostal)) or die("Error SQL query");

    if ($result) {
        $row = pg_fetch_assoc($result);
        echo "<script>alert('Registro exitoso. ID: ".$row['id']."');</script>";
        return $row['id'];
    }

    echo "<script>alert('Error: No se ha podido registrar el usuario');</script>";
    return false;
}
?>
