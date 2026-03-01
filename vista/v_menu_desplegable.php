<nav class="menu" id="menuDesplegable">
    <h2 class="menu-titulo">MENÚ</h2>

    <button class="cerrar-menu" aria-label="Cerrar menú">
    <img src="/../img/close_symbol.png" alt="Cerrar">
    </button>

    <ul>

        <li><a href="index.php">🏠 Inicio</a></li>

        <li><a href="#" onclick="cargarProductosPromocionales()">🔥 Ofertas</a></li>

        <li class="submenu">
            <a href="#">🪴 Productos</a>
            <ul class="submenu-lista">
                <?php foreach ($categorias as $cat): ?>
                    <li>
                        <a href="#" onclick="cargarProductosCategoria(<?= $cat['id'] ?>)">
                            <?= htmlentities($cat['categoria'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
        
        <?php $accionUsuario = (isset($_SESSION['id']))? "perfil": "login";?>
        <li><a href="index.php?accion=<?= $accionUsuario ?>">👤 Mi cuenta</a></li>

        <li>
            <a href="index.php?accion=carrito">🛒 Carrito</a>
        </li>
    </ul>
</nav>
