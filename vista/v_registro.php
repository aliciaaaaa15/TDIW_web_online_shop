<section id="formulariRegistre" class="registro-box">
    <?php if (isset($_GET['error'])) : ?>
        <p class="error">Ya existe un usuario con estos datos</p>
    <?php endif; ?>

    <header>
        <h3>Registro de usuario</h3>
    </header>
    
    <p>Ponga su datos a continuación:</p>

    <form method="post" action="/../controlador/c_registro.php">

        Nombre: <input type="text" name="nombre" required maxlength="30" 
        pattern="^[A-Za-zÀ-ÖØ-öø-ÿ ]{1,30}$"
        title="Solo letras y espacios (máx. 30 caracteres)."/><br/>

        Email: <input type="email" name="email" required maxlength="254" 
        pattern="^[^\s@]+@[^\s@]+\.[^\s@]{2,}$"
        title="Introduce un email válido (ej: usuario@dominio.com)."/><br/>
        
        Contraseña:  <input type="password" name="password" required minlength="4" maxlength="30" 
        pattern="^[A-Za-z0-9]{4,30}$"
        title="Solo letras y números (4–30 caracteres)."/><br/>

        Dirección: <input type="direccion" name="direccion" required maxlength="30" 
        pattern="^[A-Za-zÀ-ÖØ-öø-ÿ0-9 ,.\-]{1,30}$"
        title="Máx. 30 caracteres. Letras/números y , . -"/><br/>

        Población: <input type="poblacion" name="poblacion" required maxlength="30"
        pattern="^[A-Za-zÀ-ÖØ-öø-ÿ ]{1,30}$"
        title="Solo letras y espacios (máx. 30 caracteres)."/><br/>

        Código Postal: <input type="cp" name="cp" required maxlength="5" inputmode="numeric"
        pattern="^\d{5}$"
        title="Introduce 5 dígitos (ej: 08001)."/><br/>

        <button type="submit">Registrarse</button><br/>
    </form>
</section>
