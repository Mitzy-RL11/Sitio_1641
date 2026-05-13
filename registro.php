<?php
// 1. Conexión a la base de datos corregida
// Parámetros: servidor, usuario, contraseña, nombre de la base de datos
$conexion = new mysqli("localhost", "root", "", "pagina_n");

// 2. Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 3. Recibir datos del formulario (asegúrate que el HTML use estos 'name')
$nombre     = $_POST['nombre'];
$correo     = $_POST['correo'];
$comentario = $_POST['comentario'];

// 4. Insertar en la tabla 'registro' (Nombre de tabla actualizado)
$sql = "INSERT INTO registro (nombre, correo, comentario) VALUES ('$nombre', '$correo', '$comentario')";

if ($conexion->query($sql) === TRUE) {
    // Mensaje de éxito con un poco de estilo
    echo "<div style='font-family: sans-serif; color: #E01E5A; text-align: center; margin-top: 50px;'>";
    echo "<h2>¡Registro exitoso!</h2>";
    echo "<p>Gracias $nombre, tu comentario ha sido guardado </b>.</p>";
    echo "<a href='index.html' style='color: #FFD700;'>Volver al inicio</a>";
    echo "</div>";
} else {
    echo "Error al registrar: " . $conexion->error;
}

// 5. Cerrar conexión
$conexion->close();
?>