<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    
    require 'base-paginas.php';

    ?>
    
    <meta charset="utf-8">
    <title>Gestor de Rutas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1XFUG4cI94Kdq36I_lWHhz3FJNSNCPgg&libraries=places"></script>
</head>

<body>

    <?php
    include 'base-navbar.php';
    ?>

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
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
                <script src="script-rutas2.js"></script>

                        <!-- Footer Start -->
                        <div class="container-fluid pt-4 px-4">
                            <div class="bg-light rounded-top p-4">
                                <div class="row">
                                    <div class="col-12 col-sm-6 text-center text-sm-start">
                                        &copy; <a href="#">Logistica Cataso</a>, All Right Reserved.
                                    </div>
                                    <div class="col-12 col-sm-6 text-center text-sm-end">
                                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                                        </br>
                                        Distributed By <a class="border-bottom" href="https://themewagon.com"
                                            target="_blank">ThemeWagon</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Footer End -->
                    
                </div>


            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>

</html>