<?php 
    include_once __DIR__."/../modelo/m_conectarBD.php";
    include_once __DIR__."/../modelo/m_productos.php";

    $con = conectarBD();
    $productos = loadProductosPromo($con);

    include_once __DIR__."/../vista/v_productos_promo_inicio.php";

?>