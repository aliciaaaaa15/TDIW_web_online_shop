document.addEventListener('DOMContentLoaded', function() {
    $('.user-icon').click(function(e){
        e.stopPropagation();
        $(this).siblings('.user-dropdown').toggleClass('open');
    });

    $(document).click(function(){
        $('.user-dropdown').removeClass('open');
    });
});

// Controlador barra navegacion (menu)
const btn = document.querySelector('.menu-button'); // el botón
const menu = document.querySelector('.menu'); // el menú
const closeBtn = document.querySelector(".cerrar-menu");

closeBtn.addEventListener("click", () => {
    menu.classList.remove("open");
});

btn.addEventListener('click', (e) => {
    e.stopPropagation();
    menu.classList.toggle('open');
});

menu.addEventListener('click', (e) => {
    e.stopPropagation();
});

document.addEventListener('click', (event) => {
    // Si el menú está abierto y el clic NO es ni en el menú ni en el botón
    if(menu.classList.contains('open') && !menu.contains(event.target) && !btn.contains(event.target)) {
        menu.classList.remove('open');
    }
});

document.querySelectorAll(".submenu").forEach(sub => {
    const textoDesplegable = sub.querySelector("a");
    const listaSubmenu = sub.querySelector(".submenu-lista");

    textoDesplegable.addEventListener("click", (e) => {
        e.preventDefault();
        listaSubmenu.classList.toggle("open");
        sub.classList.toggle("abierto");
    });
});

async function cargarProductosCategoria(idCategoria){
    try {
        const respuesta = await fetch("/controlador/c_productos.php?idCategoria=" + idCategoria);
        const respuestaHTML = await respuesta.text();
        document.getElementById("contenido-principal").innerHTML = respuestaHTML;
        menu.classList.remove("open");
    } catch (error) {
        document.getElementById("contenido-principal").innerHTML = "<p>Error cargando productos.</p>";
        menu.classList.remove("open");
    }
}

async function cargarDetallesProducto(idProducto){
    try {
        const respuesta = await fetch("/controlador/c_detalles_producto.php?idProducto=" + idProducto);
        const respuestaHTML = await respuesta.text();
        document.getElementById("contenido-principal").innerHTML = respuestaHTML;
    } catch(error){
        document.getElementById("contenido-principal").innerHTML = "<p>Error cargando los detalles del producto seleccionado.</p>";
    }
}


async function anadirAlCarrito(idProducto){
    let inputCantidad = document.getElementById("cantidad");
    let cantidad = inputCantidad ? inputCantidad.value: 1;

    const formData = new FormData();
    formData.append('accion', 'add');
    formData.append('idProducto', idProducto);
    formData.append('cantidad', cantidad);

    
    const respuesta = await fetch("/controlador/c_carrito_acciones.php", {
        method: "POST",
        body: formData
    });

    const data = await respuesta.json();
    if (data.ok){ 
        await refrescarCarritoLateral(); 
        mostrarNotificacion("✅ Producto añadido al carrito");

    }
}



async function eliminarDelCarrito(idProducto){
    const formData = new FormData();
    formData.append('accion', 'remove');
    formData.append('idProducto', idProducto);

    const res = await fetch("/controlador/c_carrito_acciones.php", {
        method: "POST",
        body: formData
    });

    const data = await res.json();
    if (data.ok){ 
        await refrescarCarritoLateral(); 
        mostrarNotificacion("✅ Producto eliminado del carrito");
        refrescarVistaCarrito();

    }
}

async function vaciarCarrito(){
    const formData = new FormData();
    formData.append('accion', 'erase');

    const res = await fetch("/controlador/c_carrito_acciones.php", {
        method: "POST",
        body: formData
    });

    const data = await res.json();
    if (data.ok){ 
        await refrescarCarritoLateral(); 
        mostrarNotificacion("✅ Carrito Vaciado");
        refrescarVistaCarrito();
    }
}

async function modificarCantidad(idProducto, cambio) {
    const formData = new FormData();
    formData.append('accion', 'update');  
    formData.append('idProducto', idProducto);
    formData.append('cambio', cambio);

    const res = await fetch('/controlador/c_carrito_acciones.php', {
        method: 'POST',
        body: formData
    });

    const data = await res.json(); 
    if (data.ok) { 
        await refrescarVistaCarrito();
        await actualizarCarritoLateral(); // 🔥 refresca el carrito lateral 
    }
}

async function modificarCantidadLateral(idProducto, cambio) {
    const formData = new FormData();
    formData.append('accion', 'update');  
    formData.append('idProducto', idProducto);
    formData.append('cambio', cambio);

    const res = await fetch('/controlador/c_carrito_acciones.php', {
        method: 'POST',
        body: formData
    });

    const data = await res.json(); 
    if (data.ok) { 
        await actualizarCarritoLateral(); // 🔥 refresca el carrito lateral 
    }
}

async function refrescarVistaCarrito(){
    const carritoLayout = document.getElementById("contenido-principal");
    if (carritoLayout) {
        try{
            const html = await fetch('/controlador/c_carrito.php');
            carritoLayout.innerHTML = await html.text();
        } catch (error){
            console.error("Error al refrescar la vista del carrito:", error);
        }
    }
}


// Variable global para controlar el tiempo del mensaje
let snackbarTimer;

function mostrarNotificacion(mensaje, tipo = "success") {
    let snackbar = document.getElementById("snackbar");
    if (!snackbar) {
        snackbar = document.createElement("div");
        snackbar.id = "snackbar";
        document.body.appendChild(snackbar);
    }

    clearTimeout(snackbarTimer);
    snackbar.classList.remove("show");
    void snackbar.offsetWidth;

    snackbar.textContent = mensaje;
    snackbar.className = "show " + tipo;

    snackbarTimer = setTimeout(function(){ 
        snackbar.classList.remove("show");
    }, 3000);
}

async function finalizarCompra() {
    try {
        const respuesta = await fetch("/controlador/c_tramitar_compra.php");
        const contenido = await respuesta.text();

        if (contenido === "USUARIO_NO_LOGUEADO") {
            mostrarModalSesion();
        } 
        else if (contenido === "CARRITO_VACIO") {
            alert("Tu carrito está vacío.");
        } 
        else if (contenido === "ERROR_DATABASE") {
            alert("Hubo un problema al guardar tu pedido en la base de datos.");
        } 
        else {
            document.getElementById("contenido-principal").innerHTML = contenido;
            
            refrescarCarritoLateral(); 
            
            window.scrollTo(0, 0);
        }
    } catch (error) {
        console.error("Error en la petición AJAX:", error);
    }
}

async function refrescarCarritoLateral() {
    try {
        await actualizarCarritoLateral();  // refresca el carrito lateral SIEMPRE
    } catch (error) {
        console.error("Error al refrescar la vista del carrito lateral:", error);
    }
}

async function actualizarCarritoLateral() {
    const contenedor = document.getElementById("carrito_lateral");
    if (!contenedor) return;

    const html = await fetch('/controlador/c_carrito_lateral.php');
    const contenido = await html.text();

    // Primero insertamos el HTML tal cual
    contenedor.innerHTML = contenido;

    // Ahora comprobamos si realmente está vacío
    const estaVacio = contenedor.textContent.trim() === "";

    if (estaVacio) {
        contenedor.classList.add("oculto");
    } else {
        contenedor.classList.remove("oculto");
    }
}







function mostrarModalSesion() {
    const modalHTML = `
        <div id="modal-sesion" class="modal-overlay">
            <div class="modal-content">
                <h3>Inicia sesión</h3>
                <p>Debes estar identificado para finalizar la compra.</p>
                <div class="modal-botones">
                    <a href="index.php?accion=login" class="btn-aceptar">Ir al Login</a>
                    <button onclick="document.getElementById('modal-sesion').remove()" class="btn-cancelar">Cerrar</button>
                </div>
            </div>
        </div>`;
    document.body.insertAdjacentHTML('beforeend', modalHTML);
}

//modificar perfil
function enviarPerfil() {
    const form = document.getElementById("formPerfil");

    if (!form.checkValidity()) { 
        form.reportValidity(); 
        return; // ❌ No envía si hay errores 
    }

    form.action = "/controlador/c_perfil_acciones.php";
    form.submit();
}

function cancelarPerfil() {
    window.location.href = "/index.php?accion=perfil";
}

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("guardarCambiosPerfil")?.addEventListener("click", enviarPerfil);
    document.getElementById("cancelarPerfil")?.addEventListener("click", cancelarPerfil);

});

