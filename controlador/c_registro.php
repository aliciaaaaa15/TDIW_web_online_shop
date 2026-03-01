<?php
    include_once __DIR__."/../modelo/m_conectarBD.php";
    include_once __DIR__."/../modelo/m_registrar_usuario.php";

    $name = $_REQUEST['nombre'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $direccion = $_REQUEST['direccion'];
    $poblacion = $_REQUEST['poblacion'];
    $cp = $_REQUEST['cp'];

    $con = conectarBD();
    $res = registrarUsuarioBD($con, $name, $email, $password, $direccion, $poblacion, $cp );
    
    if(!$res){
        header("Location: /index.php?accion=registro&error=1");
        exit();
    } else{
        session_start();
        $_SESSION['nombre'] = $name;
        $_SESSION['id'] = $res;
        $_SESSION['email'] = $email;
        $_SESSION['direccion'] = $direccion;
        $_SESSION['poblacion'] = $poblacion;
        $_SESSION['cp'] = $cp;
        header("Location: /index.php?accion=registroExitoso");
        exit();
    }
?>