<div class="lista-productos-promo">
    <?php if (!empty($productos) && is_array($productos)): ?>
        <?php foreach ($productos as $producto): ?>
            <div class="producto-promo" onclick="cargarDetallesProducto(<?= $producto['id'] ?>)">
                <div class="producto-info">
                    <div class="producto-img">
                        <img src="<?= htmlspecialchars($producto['imagen'] ?: '/img/product_placeholder.jpg', ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" 
                            alt="<?= htmlspecialchars($producto['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>">
                    </div>
                    <h3 class="promo-nombre"><?= htmlentities($producto['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></h3>

                </div>
                <div class="producto-precio">
                    <?php
                        $precioOriginal = (float)$producto['precio'];

                        $promoValor = !empty($producto['promo_valor']) ? (float)$producto['promo_valor'] : 0;

                        $precioRebajado = round($precioOriginal * (1 - $promoValor / 100), 2);
                    ?>

                    <?php if ($promoValor > 0): ?>
                        <p class="detalle-precio">
                            <span class="precio-original">
                                <?= htmlentities(number_format($precioOriginal, 2), ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> €
                            </span>
                            <span class="precio-rebajado">
                                <?= htmlentities(number_format($precioRebajado, 2), ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> €
                            </span>
                        </p>
                    <?php else: ?>
                        <p class="precio-normal">
                            <?= htmlentities(number_format($precioOriginal, 2), ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> €
                        </p>
                    <?php endif; ?>
                </div>

                <?php if (!empty($producto['promo_texto'])): ?>
                <div class="promo">
                    <p><?= htmlentities($producto['promo_texto'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></p>
                </div>
                <?php endif; ?>

                <div class="boton-carrito" >
                    <button class="agregarCarrito" onclick="anadirAlCarrito(<?= $producto['id'] ?>); event.stopPropagation();">Añadir al carrito</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay promociones disponibles.</p>
    <?php endif; ?>
</div>