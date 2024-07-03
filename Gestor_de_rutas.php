<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    
    require 'base-paginas.php';

    ?>
    <!-- J Query -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            // Verificar si hay datos en el localStorage al cargar la página
            const datos = JSON.parse(localStorage.getItem('nuevaFila'));
            if (datos) {
                // Añadir la nueva fila a la tabla
                $("#vehiculos tbody").append(
                    `<tr>
                        <td><input class="form-check-input" type="checkbox"></td>
                        <td>${datos.modelo}</td>
                        <td>${datos.patente}</td>
                        <td>${datos.kilometraje}</td>
                        <td>${datos.capacidad_personas}</td>
                        <td>${datos.capacidad_transporte}</td>
                        <td>${datos.estado}</td>
                        
                    </tr>`
                );
                // Limpiar el localStorage
                localStorage.removeItem('nuevaFila');
            }

            // Redirigir al formulario
            $("#agregar").click(function(){
                window.location.href = 'agregar_vehiculos.html';
            });
        });
    </script>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
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
</head>

<body>

    <?php
    include 'base-navbar.php';
    ?>

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="wrapper">
                        <div class="container-calendar">
                            <div id="left">
                                <h1>Departures and arrivals</h1>
                                <div id="event-section">
                                    <h3>Añadir evento</h3>
                                    <input type="date" id="eventDate">
                                    <input type="text"
                                        id="eventTitle"
                                        placeholder="Event Title">
                                    <input type="text"
                                        id="eventDescription"
                                        placeholder="Event Description">
                                    <button id="addEvent" onclick="addEvent()">
                                        Add
                                    </button>
                                </div>
                                <div id="reminder-section">
                                    <h3>Recordatorios</h3>
                                    <!-- List to display reminders -->
                                    <ul id="reminderList">
                                        <li data-event-id="1">
                                            <strong>Event Title</strong>
                                            - Event Description on Event Date
                                            <button class="delete-event"
                                                onclick="deleteEvent(1)">
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="right">
                                <h3 id="monthAndYear"></h3>
                                <div class="button-container-calendar">
                                    <button id="previous"
                                            onclick="previous()">
                                        ‹
                                    </button>
                                    <button id="next"
                                            onclick="next()">
                                        ›
                                    </button>
                                </div>
                                <table class="table-calendar"
                                    id="calendar"
                                    data-lang="en">
                                    <thead id="thead-month"></thead>
                                    <!-- Table body for displaying the calendar -->
                                    <tbody id="calendar-body"></tbody>
                                </table>
                                <div class="footer-container-calendar">
                                    <label for="month">Jump To: </label>
                                    <!-- Dropdowns to select a specific month and year -->
                                    <select id="month" onchange="jump()">
                                        <option value=0>Jan</option>
                                        <option value=1>Feb</option>
                                        <option value=2>Mar</option>
                                        <option value=3>Apr</option>
                                        <option value=4>May</option>
                                        <option value=5>Jun</option>
                                        <option value=6>Jul</option>
                                        <option value=7>Aug</option>
                                        <option value=8>Sep</option>
                                        <option value=9>Oct</option>
                                        <option value=10>Nov</option>
                                        <option value=11>Dec</option>
                                    </select>
                                    <!-- Dropdown to select a specific year -->
                                    <select id="year" onchange="jump()"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script src="./calendar_script.js"></script>
                    
                    
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Generador de rutas</h6>
                        </div>
                        <div class="container-fluid full-height d-flex flex-column">
                            <iframe src="map_test.html" style="border:none; width:100%; height:300px;" ></iframe>
                        </div>
                        
                    </div>
                            
                        </div>
                        <!-- Widgets End -->
                        

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