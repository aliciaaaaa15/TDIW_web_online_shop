<?php if (empty($carrito)): ?>
    <div class="carrito-vacio">
        <div class="carrito-vacio-icono">🛒</div>
        <h3>Tu carrito está vacío</h3>
        <p>Explora nuestros productos y añade lo que más te guste.</p>
        <a href="index.php?accion=productos" class="btn-seguir-comprando">
            Seguir comprando
        </a>
    </div>
<?php else: ?>

<div class="carrito-layout">
    <div class="carrito-header">
        <h2>🛒 Tu carrito</h2>
        <button class="btn-vaciar" onclick="vaciarCarrito()">
            🗑️ Vaciar carrito
        </button>
    </div>

    <div class="carrito-lista">
        <?php foreach ($carrito as $item): ?>
            <div class="carrito-item">
                <div class="item-info">
                    <h3><?= htmlentities($item['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></h3>
                    <p>Precio unitario: <?= number_format($item['precio'], 2) ?> €</p>
                    <p class="item-subtotal">
                        Subtotal: <?= number_format($item['subtotal'], 2) ?> €
                    </p>

                    <div class="item-cantidad">
                        <button type="button" 
                                onclick="modificarCantidad(<?= $item['id'] ?>, -1)"
                                >-</button>
                        <span class="cantidad-valor"><?= $item['cantidad'] ?></span>
                        <button type="button" 
                                onclick="modificarCantidad(<?= $item['id'] ?>, 1)">+</button>
                    </div>
                </div>

                <div class="item-acciones">
                    <button type="button" onclick="eliminarDelCarrito(<?= $item['id'] ?>)">
                        ❌ Eliminar
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="carrito-resumen">
        <h3>Resumen</h3>
        <p>Total productos: <?= array_sum(array_column($carrito, 'cantidad')) ?></p>
        <p class="total">Total: <?= number_format($total, 2) ?> €</p>

        <button class="btn-comprar" onclick="finalizarCompra();">
            Finalizar compra
        </button>
    </div>
</div>
<?php endif; ?>