<?php
    include_once __DIR__."/../modelo/m_conectarBD.php";
    include_once __DIR__."/../modelo/m_productos.php";

    $idCategoria = isset($_GET['idCategoria']) ? intval($_GET['idCategoria']) : null;
    $textoBusqueda = (isset($_GET['query']) && $_GET['query'] !== "" ) ? trim($_GET['query']) : null;
    $esPromo = isset($_GET['promocion']) ? true: false;
    
    $con = conectarBD();
    if ($idCategoria !== null) {
        $productos = getProductosPorCategoria($con, $idCategoria);
    } else if ($textoBusqueda !== null) {
        $productos = buscarProductos($con, $textoBusqueda);
    } else if ($esPromo){
        $productos = loadProductosPromo($con);
    }else {
        $productos = getTodosLosProductos($con);
    }

    include_once __DIR__."/../vista/v_productos_encabezado.php";
    include_once __DIR__."/../vista/v_productos.php";
?>