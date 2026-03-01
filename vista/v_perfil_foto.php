<div class='contenedor-editor-img-perfil'>
    <div class='contenedor-componentes-edit-foto'>
        <h3>Editar foto de perfil</h3>
        <div class='contenedor-formulario-edit-foto'>
            <form id="subir-foto-form" method="post" enctype="multipart/form-data" action="index.php?accion=subir_foto">
                <input type="file" id="profile_image" name="profile_image" accept="image/png,image/jpeg,image/webp">
            </form>
        
        </div>
        <div class='contenedor-botones-edit-foto'>
            <button form="subir-foto-form" type="submit" id="subir-foto-perfil">Subir</button>
            <button type="button" onclick="window.location.href='index.php?accion=perfil'">Cancelar</button>
        </div>
    </div>
    
</div>
