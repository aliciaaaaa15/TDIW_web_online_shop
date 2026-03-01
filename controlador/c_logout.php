<?php
    // Inicia el buffer de salida antes de cualquier contenido
    ob_start();

    // Inicia sesión solo si no está activa
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Limpia y destruye la sesión
    session_unset();      // elimina las variables de sesión
    session_destroy();    // destruye la sesión

    // Redirige al inicio
    header("Location: /index.php?accion=inicio");
    exit();
?>
