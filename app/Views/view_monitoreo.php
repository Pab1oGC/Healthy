<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo de Salud y Registro de Pacientes</title>
    <!-- Enlaces a AdminLTE CSS y Font Awesome -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <style>
        body {
    font-family: 'Source Sans Pro', sans-serif;
}

.content-wrapper {
    padding: 20px;
    display: flex;
    flex-direction: column;
    height: 100vh; /* Full height */
}

.large-box {
    height: calc(45vh - 20px); /* Adjust height */
    display: flex;
    justify-content: center; /* Center both items horizontally */
    align-items: center; /* Center items vertically */
    margin-bottom: 20px; /* Adjust margin */
    padding: 20px; /* Add padding */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Add shadow */
    border-radius: 10px; /* Rounded corners */
    box-sizing: border-box; /* Ensure padding is included in the height calculation */
}

.large-box .inner {
    text-align: left; /* Align text to the left */
    margin-right: 10px; /* Add a small margin to the right of the text */
    font-size: 1.2rem; /* Increase font size */
    color: #fff; /* White text color */
}

.large-box .icon {
    font-size: 5rem;
    color: #fff; /* White icon color */
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
    function refrescarPagina() {
        location.reload(true); // Recarga la página desde el servidor
    }

    // Llama a la función para refrescar la página cada cierto intervalo de tiempo
    setInterval(refrescarPagina, 1000); // Por ejemplo, cada 60 segundos
});
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto align-items-center">
            <li class="nav-item">
                    <a href="<?php echo base_url('parar'); ?>" class="btn btn-primary">Detener Monitoreo</a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    
                </div>
                <div class="info">
                    
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="sidebar-link-monitoreo">
                            <i class="nav-icon fas fa-heartbeat"></i>
                            <p>Monitoreo de Salud</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('registrar') ?>" class="nav-link" id="sidebar-link-registro">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Registro de Pacientes</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div id="content" class="h-100">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Monitoreo de Salud</h1>
            </div>
        </div>
        </div>
    </div>
<section class="content">
    <?php foreach ($pacientes as $paciente): ?>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-6 col-12 mb-3 h-50">
                <div class="large-box bg-info">
                    <div class="inner mb-3"> <!-- Agregando margen inferior a la clase inner -->
                        <h3 id="heart-rate"><?php echo $paciente->bpm; ?></h3>
                        <p class="mb-0">Frecuencia cardíaca</p> <!-- Agregando margen inferior cero a evitar espacio adicional -->
                    </div>
                    <div class="icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-6 col-12 mb-3 h-50">
                <div class="large-box bg-success">
                    <div class="inner">
                        <h3 id="temperature"><?php echo $paciente->temperatura; ?></h3>
                        <p>Temperatura Corporal</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-thermometer-half"></i>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="row h-100">
            <div class="col-lg-6 col-12 mb-3 h-50">
                <div class="large-box bg-warning">
                    <div class="inner">
                        <h3 id="gas-level"><?php echo $paciente->rpm; ?></h3>
                        <p>Frecuencia respiratoria</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-lungs"></i>
                    </div>
                  
                </div>
            </div>
            <div class="col-lg-6 col-12 mb-3 h-50">
                <div class="large-box bg-danger">
                    <div class="inner">
                        <h3 id="oximetry"><?php echo $paciente->spo2; ?></h3>
                        <p>Oximetría</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-heart"></i> <!-- Icono para oximetría del corazón -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>
        </div>
    </div>

</div>
<!-- Enlaces a jQuery, Bootstrap y AdminLTE JS -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>
</html>
