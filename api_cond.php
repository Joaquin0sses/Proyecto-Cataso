<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Asegurarse de que REQUEST_METHOD esté definido
if (!isset($_SERVER['REQUEST_METHOD'])) {
    echo 'No request method specified';
    exit;
}

// Ruta para obtener todos los conductores
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getConductor'])) {
    $stmt = $pdo->query('SELECT id_conductor, nombre, edad FROM Conductor');
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_conductor'], $_POST['nombre'], $_POST['id_licencia'], $_POST['edad'], $_POST['description'])) {
    $id_conductor = $_POST['id_conductor'];
    $nombre = $_POST['nombre'];
    $id_licencia = $_POST['id_licencia'];
    $edad = $_POST['edad'];
    $description = $_POST['description'];
    $stmt = $pdo->prepare('INSERT INTO Conductor (id_conductor, nombre, id_licencia, edad, description) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$id_conductor, $nombre, $id_licencia, $edad, $description]);
    $newConductor = ['id_conductor' => $id_conductor, 'nombre' => $nombre, 'id_licencia' => $id_licencia, 'edad' => $edad, 'description' => $description];
    echo json_encode($newConductor);
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