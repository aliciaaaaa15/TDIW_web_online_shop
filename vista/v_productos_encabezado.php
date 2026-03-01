<div class="productos-encabezado">
    <?php if (!empty($_GET['idCategoria']) && !empty($productos)): ?>
        <h2>Mostrando resultados para la categoría: <?= htmlentities($productos[0]['categoria'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></h2>
        <p><?= htmlentities($productos[0]['descripcion'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></p>

    <?php elseif (!empty($_GET['query'])): ?>
        <h2>Mostrando resultados para: "<?= htmlentities($_GET['query'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>"</h2>
        <?php if (empty($productos)): ?>
            <p>No se encontraron productos que coincidan con tu búsqueda.</p>
        <?php endif; ?>

    <?php else: ?>
        <h2>Mostrando todos los productos disponibles:</h2>
    <?php endif; ?>
</div>
