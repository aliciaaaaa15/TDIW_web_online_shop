<section class="login-box">
    <?php if (isset($_GET['error'])) : ?>
        <p class="error">Usuario o contraseña incorrectos</p>
    <?php endif; ?>

    <header>
        <h3>Iniciar Sesión</h3>
    </header>

    <form id="loginForm" method="POST" action="/controlador/c_login.php">
        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" required />

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit">Iniciar Sesión</button>
    </form>

    <p>¿No tienes una cuenta? <a href="index.php?accion=registro">Registrate</a></p>
</section>
