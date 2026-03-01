<?php 
    session_start();


    $accion = $_GET['accion'] ?? 'inicio'; 

    //if ($accion === 'subir_foto') { require __DIR__ . "/controlador/c_perfil_foto.php"; exit; }


    $filesPublicPath   = "/uploadedFiles/";
    $filesAbsolutePath = "/home/TDIW/tdiw-e8/public_html/uploadedFiles/";
    require __DIR__."/resource_home.php"; 
?>

<div id="contenido-principal">
    <?php
    switch ($accion) {
        case 'inicio':
            require __DIR__."/resource_inicio.php";
            break;
        case 'perfil':
            require __DIR__."/resource_perfil.php";
            break;
        case 'login':
            require __DIR__."/resource_login_form.php";
            break;
        case 'carro': 
            require __DIR__."/resource_carrito.php";
            break;
        case 'registro':
            require __DIR__."/resource_registro.php";
            break;
        case 'productos':
            require __DIR__."/resource_productos.php";
            break;
        case 'mis_compras': //no implementado
            require __DIR__."/resources_mis_compras.php";
            break;
        case 'logout':
            require __DIR__."/resources_logout.php";
            break;
        case 'buscar':
            require __DIR__."/resources_buscar.php";
            break;
        case 'registroExitoso':
            require __DIR__."/resources_registro_exitoso.php";
            break;
        case 'modificar_perfil':
            require __DIR__."/resources_modificar_cuenta.php";
            break;
        case 'modificar_perfil_foto':
            require __DIR__."/resources_foto_perfil.php";
            break;
        case 'subir_foto':
            require __DIR__."/resources_subir_foto.php";
            break;
        default:
            echo "<p>Página no encontrada</p>";
    }?>


</div>



<?php require __DIR__."/vista/v_footer.php"; ?>

    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/../js/funciones.js"></script>