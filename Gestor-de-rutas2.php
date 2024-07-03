<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Rutas</title>
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1XFUG4cI94Kdq36I_lWHhz3FJNSNCPgg&libraries=places"></script>
</head>
<body>
    <div class="container">
        <h1>Gestor de Rutas</h1>
        <form id="route-form" action="calculate.php" method="POST">
            <div class="form-group">
                <label for="origin">Lugar de Origen:</label>
                <input type="text" id="origin" name="origin" required>
            </div>
            <div class="form-group">
                <label for="destination">Destino:</label>
                <input type="text" id="destination" name="destination" required>
            </div>
            <div class="form-group">
                <label for="departure-time">Hora de Salida:</label>
                <input type="time" id="departure-time" name="departure-time" required>
            </div>
            <div class="form-group">
                <label for="departure-date">Día:</label>
                <input type="date" id="departure-date" name="departure-date" required>
            </div>
            <div class="form-group">
                <label for="rest-mode">Modo de Viaje:</label>
                <select id="rest-mode" name="rest-mode" required>
                    <option value="normal">Normal</option>
                    <option value="4h-drive-2h-rest">4 horas de manejo y 2 horas de descanso</option>
                </select>
            </div>
            <div class="form-group">
                <label for="toll-cost">Costo del Peaje (CLP):</label>
                <input type="number" id="toll-cost" name="toll-cost" required>
            </div>
            <div class="form-group">
                <label for="driver-cost">Costo del Conductor por Hora (CLP):</label>
                <input type="number" id="driver-cost" name="driver-cost" required>
            </div>
            <div class="form-group">
                <label for="fuel-efficiency">Eficiencia de Combustible (Km/L):</label>
                <input type="number" id="fuel-efficiency" name="fuel-efficiency" required>
            </div>
            <div class="form-group">
                <label for="fuel-cost">Costo de la Gasolina (CLP/L):</label>
                <input type="number" id="fuel-cost" name="fuel-cost" required>
            </div>
            <button type="submit">Calcular Ruta</button>
        </form>
        <div id="map"></div>
        <div id="output">
            <h2>Detalles de la Ruta</h2>
            <p id="distance"></p>
            <p id="duration"></p>
            <p id="rest-info"></p>
            <p id="toll-info"></p>
            <p id="driver-cost-info"></p>
            <p id="fuel-cost-info"></p>
            <p id="total-cost-info"></p>
        </div>
    </div>
    <script src="script-rutas2.js"></script>
</body>
</html>
