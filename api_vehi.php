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

// Ruta para obtener todos los vehiculos
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['getvehiculo'])) {
    $stmt = $pdo->query('SELECT id_vehiculo, kilometros_recorridos, id_tipo_de_vehiculo FROM vehiculo');
    $vehiculo = $stmt->fetchAll();
    echo json_encode($vehiculo);
    exit;
}


// Ruta para obtener un item por ID
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM vehiculo WHERE id_vehiculo = ?');
    $stmt->execute([$id]);
    $vehiculo = $stmt->fetch();
    echo json_encode($vehiculo);
    exit;
}

// Ruta para agregar un nuevo item
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_vehiculo'], $_POST['kilometros_recorridos'], $_POST['id_tipo_de_vehiculo'])) {
    $id_vehiculo = $_POST['id_vehiculo'];
    $kilometros_recorridos = $_POST['kilometros_recorridos'];
    $id_tipo_de_vehiculo = $_POST['id_tipo_de_vehiculo'];
    $stmt = $pdo->prepare('INSERT INTO vehiculo (id_vehiculo, kilometros_recorridos, id_tipo_de_vehiculo) VALUES (?, ?, ?)');
    $stmt->execute([$id_vehiculo, $kilometros_recorridos, $id_tipo_de_vehiculo]);
    header('Location: Menu_vehiculos.php');
    exit;
}

// Ruta para eliminar un item por ID
if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $pdo->prepare('DELETE FROM vehiculo WHERE id_vehiculo = ?');
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
    exit;
}
?>