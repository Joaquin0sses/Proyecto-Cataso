<!DOCTYPE html>
<html lang="es">
<head>
  <?php
    
    require 'base-paginas.php';

  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <title>Perfil del Vehiculo</title>

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
<div class="container-xxl position-relative bg-white d-flex p-0">
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
      <a href="Gestor_de_rutas.php" class="nav-item nav-link"><i class="bi bi-truck"></i>Gestor de rutas</a>
    </div>
  </nav>
</div>
<!-- Sidebar End -->
</div>

<!-- Content start -->
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

  <div class="container-fluid pt-4 px-4">
    <div class="bg-light text-left rounded p-4">
        <h1 class="text-primary">Perfil del Vehiculo</h1>
      <div class="table-responsive">
        <div id="profile_vehi"></div>
        <script src="profile_vehi.js"></script>
      </div>
    </div>
  </div>
</div>
<!-- Content end -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</body>
</html>