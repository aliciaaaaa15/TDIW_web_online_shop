<header class="main-header">
    <div class="menu-left">
        <button type="button" class="menu-button" aria-label="Menu lateral"><img src="/../img/navigation.png" alt="Menu"></button>
        <?php include_once __DIR__."/../controlador/c_menu_desplegable.php"?>
        
        <a href="../index.php?accion=inicio"><img src="/../img/plantitas_logo.png" class="logo" alt="Logo" aria-label="Logo"></a>
    </div>
    
    <!--Barra de busqueda-->
    <div class=search-contenedor>
    <form method="GET" action="/../index.php" class="search-bar">
            <input type="text" name="query" placeholder="Buscar plantas...">
            <input type="hidden" name="accion" value="buscar">
            <button type="submit">Buscar</button>
        </form>
    </div>

    <!--Seccion de logIn (incluye registro) y carrito-->
    <div class="user-icons">
        <section class="user-menu">
            <?php if (isset($_SESSION['img_perfil']) && !empty($_SESSION['img_perfil'])): ?>
                <img src="/uploadedFiles/<?php echo htmlspecialchars($_SESSION['img_perfil']); ?>" class="user-icon" alt="Usuario">
            <?php else: ?>
                <img src="/../img/user.png" class="user-icon" alt="Usuario">
            <?php endif; ?>
            <ul class="user-dropdown">
                <?php if(isset($_SESSION['id'])): ?>
                    <li><a href="index.php?accion=perfil">👤 Mi Cuenta</a></li>
                    <li><a href="index.php?accion=mis_compras">🧾 Mis Compras</a></li>
                    <li><a href="index.php?accion=logout">🚪 Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="index.php?accion=login">🔑 Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </section>
        <a href="index.php?accion=carro">
            <img src="/../img/carro.png" class="cart-icon" alt="Carro de compras">
        </a>
    </div>
</header>