<?php
$dsn = 'pgsql:host=34.67.116.97;port=5432;dbname=Database;user=postgres;password=cataso123';

try {
    // Crear una instancia de PDO
    $pdo = new PDO($dsn);

    // Configurar PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Realizar una consulta para verificar la conexión
    $stmt = $pdo->query('SELECT NOW()');

    // Mostrar el resultado de la consulta
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo 'Conexión exitosa. Fecha y hora del servidor: ' . $row['now'];
} catch (PDOException $e) {
    echo 'Error al conectar con la base de datos: ' . $e->getMessage();
}
?>