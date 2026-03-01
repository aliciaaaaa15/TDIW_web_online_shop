<div class="confirmacion-container">
    <div class="mensaje-exito">
        <h2>¡Pedido confirmado!</h2>
        <p>Gracias por tu compra. Tu número de pedido es el <strong>#<?= $resumenPedido['id'] ?></strong>.</p>
    </div>

    <div class="resumen-compra">
        <h3>Resumen de tu compra</h3>
        <table class="tabla-resumen">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cant.</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resumenPedido['items'] as $item): ?>
                <tr>
                    <td><?= htmlentities($item['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
                    <td><?= $item['cantidad'] ?></td>
                    <td><?= number_format($item['subtotal'], 2) ?> €</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total Pagado:</th>
                    <th><?= number_format($resumenPedido['total'], 2) ?> €</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="acciones-post-compra">
        <a href="index.php?accion=inicio" class="btn-volver">Volver a la tienda</a>
        <a href="index.php?accion=mis_compras" class="btn-compras">Ver mis pedidos</a>
    </div>
</div>