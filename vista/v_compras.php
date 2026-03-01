<div class="contenedor-historial-compras">
    <h2>Mis Compras</h2>

    <?php if (empty($agrupado)): ?>
        <p>No has realizado ninguna compra aún.</p>
    <?php else: ?>
        <table class="tabla-compras">
            <thead>
                <tr>
                    <th>ID Compra</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agrupado as $id => $pedido): ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($pedido['fecha'])); ?></td>
                        <td><?php echo number_format($pedido['total'], 2); ?> €</td>
                        <td>
                            <?php foreach ($pedido['productos'] as $prod): ?>
                                <?php echo $prod['nombre']; ?> (<?php echo $prod['cantidad']; ?> uds) — Subtotal: <?php echo number_format($prod['subtotal'], 2); ?> €<br>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
