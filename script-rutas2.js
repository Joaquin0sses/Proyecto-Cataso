// scripts.js
let map;
let directionsService;
let directionsRenderer;

function initMap() {
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
    
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -33.4489, lng: -70.6693 }, // Santiago, Chile
        zoom: 10,
    });
    
    directionsRenderer.setMap(map);
    
    const originInput = document.getElementById('origin');
    const destinationInput = document.getElementById('destination');
    const options = {
        componentRestrictions: { country: 'cl' }
    };
    
    new google.maps.places.Autocomplete(originInput, options);
    new google.maps.places.Autocomplete(destinationInput, options);
}

document.getElementById('route-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const origin = document.getElementById('origin').value;
    const destination = document.getElementById('destination').value;
    const tollCost = parseFloat(document.getElementById('toll-cost').value);
    const driverCostPerHour = parseFloat(document.getElementById('driver-cost').value);
    const fuelEfficiency = parseFloat(document.getElementById('fuel-efficiency').value);
    const fuelCostPerLiter = parseFloat(document.getElementById('fuel-cost').value);
    const restMode = document.getElementById('rest-mode').value;
    
    calculateRoute(origin, destination, tollCost, driverCostPerHour, fuelEfficiency, fuelCostPerLiter, restMode);
});

function calculateRoute(origin, destination, tollCost, driverCostPerHour, fuelEfficiency, fuelCostPerLiter, restMode) {
    const request = {
        origin: origin,
        destination: destination,
        travelMode: 'DRIVING'
    };

    directionsService.route(request, function(result, status) {
        if (status === 'OK') {
            directionsRenderer.setDirections(result);

            const route = result.routes[0].legs[0];
            const distanceText = route.distance.text;
            const durationText = route.duration.text;
            const distanceValue = route.distance.value / 1000; // km
            const durationValue = route.duration.value / 3600; // hours

            // Calcular tiempo total con descansos
            let totalDuration = durationValue;
            let restPeriods = 0;
            if (restMode === '4h-drive-2h-rest') {
                const drivingDuration = totalDuration;
                restPeriods = Math.floor(drivingDuration / 4);
                totalDuration = drivingDuration + restPeriods * 2;
            }

            // Cálculo del costo del conductor
            const driverCost = driverCostPerHour * totalDuration;

            // Cálculo del costo de la gasolina
            const fuelCost = (distanceValue / fuelEfficiency) * fuelCostPerLiter;

            // Costo total
            const totalCost = tollCost + driverCost + fuelCost;

            // Mostrar la información en la página
            document.getElementById('distance').textContent = `Distancia: ${distanceText}`;
            document.getElementById('duration').textContent = `Duración estimada: ${durationText}`;
            document.getElementById('rest-info').textContent = `Duración total con descansos: ${totalDuration.toFixed(2)} horas (incluyendo ${restPeriods} periodos de descanso de 2 horas cada uno)`;
            document.getElementById('toll-info').textContent = `Costo del peaje: CLP ${tollCost.toFixed(2)}`;
            document.getElementById('driver-cost-info').textContent = `Costo del conductor: CLP ${driverCost.toFixed(2)}`;
            document.getElementById('fuel-cost-info').textContent = `Costo de la gasolina: CLP ${fuelCost.toFixed(2)}`;
            document.getElementById('total-cost-info').textContent = `Costo total del viaje: CLP ${totalCost.toFixed(2)}`;
        } else {
            alert('No se pudo calcular la ruta: ' + status);
        }
    });
}

// Inicializar el mapa
initMap();
