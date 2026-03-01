<div class="productos-container">
    <?php if (!empty($productos)): ?>
        <div class="lista-productos">
            <?php foreach ($productos as $producto): ?>
                <div class="producto" onclick="cargarDetallesProducto(<?= $producto['id'] ?>)">
                    <?php
                        $img = !empty($producto['imagen']) ? $producto['imagen'] : '/img/product_placeholder.jpg';
                    ?>
                    <img src="<?= htmlentities($img, ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" alt="<?= htmlentities($producto['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>">      

                    <h3><?= htmlentities($producto['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></h3>
                    
                    <?php
                        $precioOriginal = (float)$producto['precio'];
                        $promoValor = !empty($producto['promo_valor']) ? (float)$producto['promo_valor'] : 0;
                        $precioRebajado = round($precioOriginal * (1 - $promoValor / 100), 2);
                    ?>

                    <div class="producto-precio">
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

                    <?php if ($promoValor > 0): ?>
                        <div class="promo">
                            <p>
                                ¡<?= htmlentities($producto['promo_texto'] ?? ("Descuento del " . $promoValor . "%"), ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>!
                            </p>
                        </div>
                    <?php endif; ?>


                    <div class="boton-carrito">
                        <button class="agregarCarrito" onclick="anadirAlCarrito(<?= $producto['id'] ?>); event.stopPropagation();">
                            Añadir al carrito
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No se han encontrado productos.</p>
    <?php endif; ?>

</div>