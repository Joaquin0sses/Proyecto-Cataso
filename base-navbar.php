
    <div style="padding: 10px 65px" class="container-xxxl position-relative bg-white d-flex p-o pading">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Logistica Cataso</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="bi bi-house-door-fill"></i>Home</a>
                    <a href="Conductores.php" class="nav-item nav-link"><i class="bi bi-person-fill"></i>Conductores</a>
                    <a href="finanza.php" class="nav-item nav-link"><i class="bi bi-pie-chart-fill"></i>Finanzas</a>
                    <a href="Menu_vehiculos.php" class="nav-item nav-link"><i class="bi bi-truck"></i>Vehiculos</a>
                    <a href="Gestor_de_rutas.php" class="nav-item nav-link"><i class="bi bi-truck"></i>Gestor de
                        rutas</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">

            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Mensajes</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">                                  
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Conductor manuel envio un reporte</h6>
                                        <small>Hace 20 minutos</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Conductor Rodrigo envio un reporte</h6>
                                        <small>Hace 15 minutos</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Conductor Juan envio un reporte</h6>
                                        <small>Hace 10 minutos</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">Ver todos los mensajes</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificaciones</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Conductor actualizado</h6>
                                <small>Hace 15 minutos</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Nuevo auto añadido</h6>
                                <small>Hace 10 minutos</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">Ver todas las notificaciones</a>
                        </div>
                    </div>
                    <?php
                    session_start();
                    $user=$_SESSION['nombre_usuario'];
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex"> <?= $user ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="cerrar-sesion.php" class="dropdown-item">Cerrar Sesion</a>
                        </div>
                    </div>
                </div>
            </nav>
           <!-- Navbar End -->