<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    
    require 'base-paginas.php';

    ?>
    
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
        
            <!-- Test commit-->
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Gasto en bencina</p>
                                <h6 class="mb-0">$400000</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Ganancias</p>
                                <h6 class="mb-0">$500000</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Vencina ahorrada</p>
                                <h6 class="mb-0">$50000</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Vehiculos en circulacion</p>
                                <h6 class="mb-0">47%</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->




            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Conductores</h6>
                                <a href="">Mostrar todo</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Larry Khapyrra</h6>
                                        <a herf="" class="text-success">Libre</a>
                                    </div>
                                    <span>Tipo de licnencia: A4</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jorge Montana</h6>
                                        <a herf="" class="text-danger">en viaje</a>
                                    </div>
                                    <span>Tipo de licencia: A2</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Leonardo Quilan</h6>
                                        <a herf="" class="text-danger">en viaje</a>
                                    </div>
                                    <span>Tipo de licencia: A4</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Juana Springfield</h6>
                                        <a herf="" class="text-success">Libre</a>
                                    </div>
                                    <span>Tipo de licencia: A4</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Disponibilidad</h6>
                                <a href="">Show All</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                </div>


                <br></br>
                <!-- Widgets End -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Conductores</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0" id="vehiculos">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col"></th>
                                        <th scope="col">Modelo</th>
                                        <th scope="col">Patente</th>
                                        <th scope="col">Kilometraje</th>
                                        <th scope="col">capacidad de personas</th>
                                        <th scope="col">Capacidad de transporte</th>
                                        <th scope="col">estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td><div class="d-flex align-items-center">
                                            
                                            <div class="w-100 ms-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-0">Camión New Delivery 6.160 | Volkswagen</h6>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div></td>
                                        <td>BB-10-15</td>
                                        <td>400 Km.</td>
                                        <td>4</td>
                                        <td>6,300 Kg</td>
                                        <td> Libre </td>

                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td><div class="d-flex align-items-center">
                                           
                                            <div class="w-100 ms-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-0">Camión New Delivery 11.180 | VW</h6>
                                                    
                                                </div>
                                               
                                            </div>
                                        </div></td>
                                        <td>RT-10-45</td>
                                        <td>80 Km.</td>
                                        <td>4</td>
                                        <td>10,700 Kg</td>
                                        <td> en viaje</td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-check-input" type="checkbox"></td>
                                        <td><div class="d-flex align-items-center">
                                            
                                            <div class="w-100 ms-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h6 class="mb-0">Camión E-Delivery 11 | Eficiencia Eléctrica</h6>
                                                    
                                                </div>
                                                
                                            </div>
                                        </div></td>
                                        <td>CR-68-30</td>
                                        <td>200 Km</td>
                                        <td>2</td>
                                        <td>11,400 Kg</td>
                                        <td>en viaje</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-primary" id="agregar">Agregar Vehiculo</a>
                </div>
                
            </div>
        </div>
    </div>






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