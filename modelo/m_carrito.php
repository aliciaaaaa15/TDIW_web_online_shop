<?php
    function construirCarrito($con) {
        $carritoSesion = $_SESSION['carrito'] ?? [];
        $carrito = [];
        $total = 0;

        foreach ($carritoSesion as $idProducto => $cantidad) {
            $producto = loadProducto($con, $idProducto);
            if (!$producto) continue;

            $precio = $producto['precio'];
            if (!empty($producto['promo_valor'])) {
                $precio = round($precio * (1 - $producto['promo_valor'] / 100), 2);
            }

            $subtotal = $precio * $cantidad;
            $total += $subtotal;

            $carrito[] = [
                'id' => $idProducto,
                'nombre' => $producto['nombre'],
                'precio' => $precio,
                'cantidad' => $cantidad,
                'subtotal' => $subtotal
            ];
        }

        return [$carrito, $total];
    }


?>