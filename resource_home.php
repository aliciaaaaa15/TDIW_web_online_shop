
<!DOCTYPE html> 
<html>
    <!--https://tdiw-e8.deic-docencia.uab.cat/-->

    <head>
        <link rel="stylesheet" href="/css/style.css">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
        <title> Plantas Maria</title> 
    </head>
    <!-- <body><header><?php // require __DIR__ . '/controlador/c_carrito_lateral.php' ?></header></body> -->

    <?php require __DIR__ . '/vista/v_encabezado.php' ?>
    <?php 
        

        
        if($accion === 'inicio' || $accion === 'productos' || $accion === 'buscar') {
            require __DIR__ . '/controlador/c_carrito_lateral.php'; 
        }
    ?>

    

</html>