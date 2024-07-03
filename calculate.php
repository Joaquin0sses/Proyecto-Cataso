<?php
// calculate.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $departureTime = $_POST['departure-time'];
    $departureDate = $_POST['departure-date'];
    $tollCost = floatval($_POST['toll-cost']);
    $driverCostPerHour = floatval($_POST['driver-cost']);
    $fuelEfficiency = floatval($_POST['fuel-efficiency']);
    $fuelCostPerLiter = floatval($_POST['fuel-cost']);
    $restMode = $_POST['rest-mode'];

    // Realiza cualquier procesamiento necesario en el servidor aquí

    // Redirigir de vuelta a la página principal
    header("Location: Gestor-de-rutas.php?origin=" . urlencode($origin) . "&destination=" . urlencode($destination));
    exit();
}
