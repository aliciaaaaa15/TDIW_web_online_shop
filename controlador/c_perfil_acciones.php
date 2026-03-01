<?php
    include_once __DIR__."/../modelo/m_conectarBD.php";
    include_once __DIR__."/../modelo/m_perfil_acciones.php";
    $con = conectarBD();
    if (session_status() === PHP_SESSION_NONE) { session_start(); }

    
    $datos = [ 
        'id' => $_SESSION['id'], 
        'nombre' => $_POST['nombre'] ?? '', 
        'email' => $_POST['email'] ?? '', 
        'direccion' => $_POST['direccion'] ?? '', 
        'poblacion' => $_POST['poblacion'] ?? '', 
        'codigo_postal' => $_POST['codigo_postal'] ?? '', 
    ]; 
    // 2. Llamar al modelo 
    $resultado = actualizarPerfil($con, $datos); 
    // 3. Comprobar si fue bien 
    if ($resultado) { // Recargar datos actualizados 
        $user = getUserDatos($con, $_SESSION['id']); 
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['direccion'] = $user['direccion'];
        $_SESSION['poblacion'] = $user['poblacion'];
        $_SESSION['cp'] = $user['cp'];
        //volvemos a perfil
        $_SESSION['mensaje_exito'] = "Perfil actualizado correctamente.";
        header("Location: ../index.php?accion=perfil");
    } 
    else { 
        $_SESSION['errores_actualizacion'] = ["Error al actualizar el perfil."];
        header("Location: ../index.php?accion=perfil");
        echo "<p>Error al actualizar el perfil</p>"; 
    }
        
?>