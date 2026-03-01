<?php
    include_once __DIR__ . "/../modelo/m_conectarBD.php";
    include_once __DIR__ . "/../modelo/m_perfil_foto.php";
    include_once __DIR__ . "/../modelo/m_perfil_acciones.php";
    $con = conectarBD();
  
    $user = getUserDatos($con, $_SESSION['id']);

    // 2. Comprobar que se ha enviado un archivo
    if (!isset($_FILES['profile_image']) || empty($_FILES['profile_image'])) {
        $_SESSION['error'] = "No se ha seleccionado ningún archivo.";
        header("Location: ../index.php?accion=perfil");
        exit;
    }



    // 3. Preparar rutas
    global $filesAbsolutePath;   // /home/TDIW/tdiw-xx/public_html/uploadedFiles/
    global $filesPublicPath;     // /uploadedFiles/

    // 4. Normalizar nombre del archivo
    $originalName = $_FILES['profile_image']['name'];
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);

    

    $extensionesPermitidas = ['png', 'jpg', 'jpeg', 'webp']; 
    if (!in_array($extension, $extensionesPermitidas)) { 
        header("Location: ../index.php?accion=perfil"); 
        exit; 
    }

    $safeName = $user['id'] . "_" . time() . "." . $extension;

    // 5. Construir ruta destino
    $destination = $filesAbsolutePath . $safeName;

    // 6. Mover archivo
    if (!move_uploaded_file($_FILES['profile_image']['tmp_name'], $destination)) {
        $_SESSION['error'] = "Error al guardar la imagen en el servidor.";
        header("Location: ../index.php?accion=perfil");
        exit;
    }

    // 7. Guardar nombre del archivo en la BD
    actualizar_imagen_cliente($con,$user['id'], $safeName);

    // 8. Actualizar sesión
    $_SESSION['img_perfil'] = $safeName;
    // 9. Redirigir con éxito
    $_SESSION['success'] = "Imagen de perfil actualizada correctamente.";
    header("Location:../index.php?accion=perfil");



?>