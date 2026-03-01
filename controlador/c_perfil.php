<?php
    include_once __DIR__."/../modelo/m_conectarBD.php";
    include_once __DIR__."/../modelo/m_perfil_acciones.php";
    $con = conectarBD();
    $user = getUserDatos($con, $_SESSION['id']);
    $_SESSION['poblacion'] = $user['poblacion'] ?? null;
    $_SESSION['direccion'] = $user['direccion'] ?? null;
    $_SESSION['cp'] = $user['cp'] ?? null;
    
    
    include_once __DIR__ . "/../vista/v_perfil.php";

?>