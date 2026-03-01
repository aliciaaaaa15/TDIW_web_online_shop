
<section class="perfil-usuario-box">
    <!-- Mostrar mensajes de éxito/error -->
    <?php if (isset($_SESSION['mensaje_exito'])): ?>
        <div class="mensaje-exito-perfil">
            <div class="noti-exito-cambio-perfil"> 
                <?= $_SESSION['mensaje_exito']; ?> 
            </div>
            <?php 
            unset($_SESSION['mensaje_exito']);
            ?>
        </div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="mensaje-error-foto-perfil">
            <div class="noti-error-cambio-foto-perfil"> 
                <?= $_SESSION['error']; ?> 
            </div>
            <?php 
            unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['errores_actualizacion'])): ?>
        <div class="mensaje-error-perfil">
            <div class="noti-error-cambios-perfil">
                <strong>Errores:</strong>
                <ul>
                    <?php foreach ($_SESSION['errores_actualizacion'] as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errores_actualizacion']); ?>
        </div>
    <?php endif; ?>

    <!-- FOTO DE PERFIL --> 
    <div class="perfil-configuraciones"> 
        <h4 class="titulo-config">Configuraciones de la cuenta</h4>
        <div class="perfil-foto">
            <?php
                $foto = trim($user['img_perfil'] ?? '');
                $src = ($foto !== '')
                ? '/uploadedFiles/' . rawurlencode($foto)
                : '/img/product_placeholder.jpg';
            ?>
            <img src="<?= $src ?>" alt="Foto de perfil">
        </div>
        <div class="perfil-configuraciones-modificaciones">
            <button class="btn-foto" onclick="window.location.href='index.php?accion=modificar_perfil_foto'"> 
                Cambiar foto de perfil 
            </button> 
            <button onclick="window.location.href='index.php?accion=modificar_perfil'"> 
                Modificar cuenta 
            </button> 
        </div>
        
    </div>

    <div id="datosUsuario" class="perfil-datos">
        <h4>Datos de usuario:</h4>
        <ul>
            <li><strong>Nombre:</strong> 
                <?= htmlentities($user['nombre'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>
            </li>

            <li><strong>Email:</strong> 
                <?= htmlentities($user['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>
            </li>

            <?php if (!empty($user['direccion'])): ?>
                <li><strong>Dirección:</strong> 
                    <?= htmlentities($user['direccion'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>
                </li>
            <?php endif; ?>

            <?php if (!empty($user['poblacion'])): ?>
                <li><strong>Población:</strong> 
                    <?= htmlentities($user['poblacion'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>
                </li>
            <?php endif; ?>

            <?php if (!empty($user['cp'])): ?>
                <li><strong>Codigo Postal:</strong> 
                    <?= htmlentities($user['cp'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>
                </li>
            <?php endif; ?>

            
        </ul>
    </div>

    <div class="perfil-acciones">
        <button onclick="window.location.href='index.php?accion=logout'">
            🚪 Cerrar Sesión
        </button>
    </div>
</section>
