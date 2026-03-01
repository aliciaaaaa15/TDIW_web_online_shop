<div class="contenedor-perfil-modificacion">
    <h2>Modificar información</h2>

    <form id="formPerfil" method="POST" class="formulario-perfil">
        <!-- Campo oculto para identificar al usuario -->
        <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
        
        <div class="form-group">
            <label for="nombre">Nombre *</label>
            <input type="text" name="nombre" id="nombre" 
                   pattern="^[A-Za-zÀ-ÖØ-öø-ÿ ]{1,30}$"
                   title="Solo letras y espacios (máx. 30 caracteres)."
                   maxlength="30"
                   value="<?= htmlspecialchars($_SESSION['nombre']) ?>" 
                   required
                   oninvalid="this.setCustomValidity('')"
                   oninput="this.setCustomValidity('')">
            <small class="form-text">Solo letras y espacios</small>
        </div>

        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" name="email" id="email"
                   maxlength="254"
                   pattern="^[^\s@]+@[^\s@]+\.[^\s@]{2,}$"
                   title="Introduce un email válido (ej: usuario@dominio.com)."
                   value="<?= htmlspecialchars($_SESSION['email']) ?>" 
                   required
                   oninvalid="this.setCustomValidity('')"
                   oninput="this.setCustomValidity('')">
        </div>


        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" 
                   pattern="^[A-Za-zÀ-ÖØ-öø-ÿ0-9 ,.\-]{1,30}$"
                   title="Máx. 30 caracteres. Letras/números y , . -"
                   value="<?= htmlspecialchars($_SESSION['direccion'] ?? '') ?>"
                   maxlength="30"
                   required>
            <small class="form-text">Máximo 100 caracteres</small>
        </div>

        <div class="form-group">
            <label for="poblacion">Población</label>
            <input type="text" name="poblacion" id="poblacion" 
                   pattern="^[A-Za-zÀ-ÖØ-öø-ÿ ]{1,30}$"
                   title="Solo letras y espacios (máx. 30 caracteres)."
                   value="<?= htmlspecialchars($_SESSION['poblacion'] ?? '') ?>"
                   maxlength="30"
                   required
                   oninvalid="this.setCustomValidity('')"
                   oninput="this.setCustomValidity('')"
                   >
        </div>

        <div class="form-group">
            <label for="codigo_postal">Código Postal</label>
            <input type="text" name="codigo_postal" id="codigo_postal" 
                   pattern="^\d{5}$"
                   title="Introduce 5 dígitos (ej: 08001)."
                   value="<?= htmlspecialchars($_SESSION['cp'] ?? '') ?>"
                   maxlength="5"
                   inputmode="numeric"
                   required
                   oninvalid="this.setCustomValidity('')"
                   oninput="this.setCustomValidity('')">
            <small class="form-text">5 dígitos (Ejemplo: 28001)</small>
        </div>

        <!-- Botones -->
        <div class="botones-container">
            <button type="button" class="boton-verde" id="guardarCambiosPerfil">
                <span id="textoBoton">Guardar cambios</span>
                <span id="cargandoBoton" style="display: none;">
                    <i class="fa fa-spinner fa-spin"></i> Guardando...
                </span>
            </button>
            
            <button type="button" class="boton-transparente" id="cancelarPerfil">
                Cancelar
            </button>

        </div>
    </form>

</div>
