<?php
include_once __DIR__."/../modelo/m_conectarBD.php";
include_once __DIR__."/../modelo/m_validar_usuario.php";

session_start(); // Necesario para usar $_SESSION

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$user = [];
$con = conectarBD();

if (validarUsuario($con, $email, $password, $user)) {
    $_SESSION['nombre'] = $user['nombre'];
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $email;
    $_SESSION['img_perfil'] = $user['img_perfil'] ?? null;
    // Redirigir a la página de perfil
    header("Location: /index.php?accion=perfil");
    exit();
} else {
    // Redirigir de vuelta al login con error
    header("Location: /index.php?accion=login&error=1");
    exit();
}

pg_close($con);
?>
