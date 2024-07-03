<?php
session_start();
$user=$_SESSION['nombre_usuario'];
echo "<h1>Bienvenido $usuario</h1>";
?>