<?php
$host = '34.67.116.97';
$db = 'Database';
$user = 'postgres';
$pass = 'cataso123';
$charset = 'utf8';

$dsn = "pgsql:host=$host;dbname=$db;user=$user;password=$pass";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, null, null, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Ruta para obtener todos los items
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['Conductor'])) {
    $stmt = $pdo->query('SELECT id, nombre, edad FROM Conductor');
    $Conductor = $stmt->fetchAll();
    echo json_encode($Conductor);
    exit;
}

// Ruta para obtener un item por ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM Conductor WHERE id_conductor = ?');
    $stmt->execute([$id]);
    $Conductor = $stmt->fetch();
    echo json_encode($Conductor);
    exit;
}

// Ruta para agregar un nuevo item
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'], $_POST['edad'], $_POST['description'])) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $description = $_POST['description'];
    $stmt = $pdo->prepare('INSERT INTO Conductor (nombre, edad, description) VALUES (?, ?, ?)');
    $stmt->execute([$nombre, $edad, $description]);
    $id = $pdo->lastInsertId();
    $newItem = ['id' => $id, 'nombre' => $nombre, 'edad' => $edad, 'description' => $description];
    echo json_encode($newItem);
    exit;
}

// Ruta para eliminar un item por ID
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $pdo->prepare('DELETE FROM Conductor WHERE id_conductor = ?');
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
    exit;
}
?>