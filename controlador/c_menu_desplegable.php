<?php
    include_once __DIR__."/../modelo/m_conectarBD.php";
    include_once __DIR__."/../modelo/m_categorias_menu.php";

    $con = conectarBD();
    
    $categorias = loadCategorias($con);
    include_once __DIR__."/../vista/v_menu_desplegable.php";
?>