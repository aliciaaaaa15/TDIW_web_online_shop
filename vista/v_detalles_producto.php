<?php if ($producto): ?>
<div class="detalle-producto-container">
    <div class="detalle-producto">
        
        <!-- Imagen del producto -->
        <div class="detalle-imagen">
            <img src="<?= htmlentities($producto['imagen'] ?: '/img/product_placeholder.jpg', ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" 
                 alt="<?= htmlentities($producto['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" />
        </div>

        <!-- Información del producto -->
        <div class="detalle-info">
            <h2 class="detalle-nombre"><?= htmlentities($producto['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></h2>
            <p class="detalle-descripcion"><?= nl2br(htmlentities($producto['descripcion'], ENT_QUOTES | ENT_HTML5, 'UTF-8')); ?></p>

            <!-- Precio con promoción -->
            <?php if (!empty($producto['promo_valor'])): ?>
                <?php 
                    $precioOriginal = $producto['precio'];
                    $precioRebajado = round($precioOriginal * (1 - $producto['promo_valor'] / 100), 2);
                ?>
                <p class="detalle-precio">
                    <span class="precio-original"><?= htmlentities($precioOriginal, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> €</span>
                    <span class="precio-rebajado"><?= htmlentities($precioRebajado, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> €</span>
                </p>
                <p class="promo">¡<?= htmlentities($producto['promo_texto'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>!</p>
            <?php else: ?>
                <p class="detalle-precio">Precio: <?= htmlentities($producto['precio'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> €</p>
            <?php endif; ?>

            <!-- Botón de añadir al carrito -->
            <div class="detalle-carrito-detalles">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" value="1" min="1" />
                <button onclick="anadirAlCarrito(<?= $producto['id'] ?>); event.stopPropagation();">Añadir al carrito</button>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<p>Producto no encontrado.</p>
<?php endif; ?>
