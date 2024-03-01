<?php
$mensaje = '';
if ($_FILES['imagen']) {
    $nombreArchivo = $_FILES['imagen']['name'];
    $rutaDestino = 'Uploads/' . $nombreArchivo;
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
        $mensaje = "Imagen subida exitosamente. Ruta: $rutaDestino";
    } else {
        $mensaje = "Error al subir la imagen.";
    }
} else {
    $mensaje = "No se recibió ninguna imagen.";
}
echo $mensaje;
?>
