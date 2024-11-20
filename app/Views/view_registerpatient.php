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
    justify-content: center;
    align-items: center;
    margin-bottom: 10px; /* Adjust margin */
}

.large-box .inner {
    text-align: center;
}

.large-box .icon {
    font-size: 5rem;
}
    </style>
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
                        <a href="<?= base_url('monitorear') ?>" class="nav-link" id="sidebar-link-monitoreo">
                            <i class="nav-icon fas fa-heartbeat"></i>
                            <p>Monitoreo de Salud</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="sidebar-link-registro">
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
                <h1 class="m-0">Registro de Pacientes</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nuevo Paciente</h3>
            </div>
            <form id="patientForm" action="<?php echo base_url().'insertarPacientes'; ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="patientName" id="patientName" placeholder="Nombre del Paciente" required>
                    </div>
                    <div class="form-group">
                        <label for="">Primer Apellido</label>
                        <input type="text" class="form-control" name="patientFirstSurname" id="patientFirstSurname" placeholder="Primer Apellido del Paciente" required>
                    </div>
                    <div class="form-group">
                        <label for="">Segundo Apellido</label>
                        <input type="text" class="form-control" name="patientSecondSurname" id="patientSecondSurname" placeholder="Segundo Apellido del Paciente">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="patientBirthdate" id="patientBirthdate" placeholder="Fecha de Nacimiento del Paciente" required>
                    </div>
                    <div class="form-group">
                        <label for="">Género</label>
                        <select class="form-control" name="patientGender" id="patientGender" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Carnet de Identidad</label>
                        <input type="text" class="form-control" name="patientIdentity" id="patientIdentity" placeholder="Carnet de Identidad del Paciente" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de Pacientes</h3>
            </div>
            <div class="card-body">
                <table id="patientsTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Género</th>
                            <th>Carnet de Identidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pacientes as $paciente): ?>
                        <tr>
                            <td><?php echo $paciente->names; ?></td>
                            <td><?php echo $paciente->surname; ?></td>
                            <td><?php echo $paciente->secondSurname; ?></td>
                            <td><?php echo $paciente->birthdate; ?></td>
                            <td><?php echo $paciente->gender; ?></td>
                            <td><?php echo $paciente->ci; ?></td>
                            <td>
                                    <a href="<?php echo base_url('editar/' . $paciente->id); ?>" class="btn btn-primary">Editar</a>
                                    <a href="<?php echo base_url('eliminar/' . $paciente->id); ?>" class="btn btn-danger">Eliminar</a>
                                    <a href="<?php echo base_url('enviarId/' . $paciente->id); ?>" class="btn btn-info">Monitorear</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
