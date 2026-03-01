    <div id="carrito_lateral">
        <?php if (!empty($carrito)):?>
            <div id="sep_espacial_car_lateral">
                <div id="sep_productos_car_lateral">
                    <?php foreach ($carrito as $item): ?>
                        <div class="carrito-item-lateral" >
                            <div class="item-info-lateral" onclick="cargarDetallesProducto(<?= $item['id'] ?>)" >
                                <h3><?= htmlentities($item['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></h3>
                                <p>Precio unitario: <?= number_format($item['precio'], 2) ?> €</p>
                                <p class="item-subtotal-lateral">
                                    Subtotal: <?= number_format($item['subtotal'], 2) ?> €
                                </p>
                            </div>
                            <div class="item-cantidad-lateral">
                                <button type="button" 
                                        onclick="modificarCantidadLateral(<?= $item['id'] ?>, -1)"
                                        >-</button>
                                <span class="cantidad-valor-lateral"><?= $item['cantidad'] ?></span>
                                <button type="button" 
                                        onclick="modificarCantidadLateral(<?= $item['id'] ?>, 1)">+</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
            <div id="sep_car_lateral">
                    <div id="sep_precios_car_lateral">
                        <h3>Resumen</h3>
                        <p>Total productos: <?= array_sum(array_column($carrito, 'cantidad')) ?></p>
                        <p class="total">Total: <?= number_format($total, 2) ?> €</p>
                    </div>

                    <div id="sep_button_car_lateral">
                        <button class="btn-comprar" onclick="finalizarCompra();">
                            Finalizar compra
                        </button>
                    </div>
            </div>  
        <?php endif; ?>
    </div>
