<?php
$servername = "34.67.116.97";
$username = "postgres";
$password = "cataso123";
$dbname = "Database";

try {
    // Conexión a la base de datos PostgreSQL
    $conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para modificar la tabla
    $sql = "ALTER TABLE vehiculo ADD COLUMN description TEXT";

    // Ejecutar la consulta
    $conn->exec($sql);
    echo "Tabla modificada exitosamente";
} catch(PDOException $e) {
    echo "Error modificando la tabla: " . $e->getMessage();
}

// Cerrar conexión
$conn = null;
?>