<?php
session_start();
$user=$_SESSION['nombre_usuario'];

if (!isset($_SESSION['nombre_usuario'])) {
    // Redirige a la página de inicio de sesión
    header("Location: signin.php");
    exit();
}

?>