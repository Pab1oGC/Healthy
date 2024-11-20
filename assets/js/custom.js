$(document).ready(function() {
    // Función para cargar contenido dinámicamente
    function loadContent(page) {
        $("#content").load(page, function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                $("#content").html(msg + xhr.status + " " + xhr.statusText);
            }
        });
    }

    // Cargar la página de monitoreo por defecto
    loadContent("pages/monitoreo.html");

    // Manejar la navegación
    $('#link-monitoreo, #sidebar-link-monitoreo').click(function(e) {
        e.preventDefault();
        loadContent("pages/monitoreo.html");
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });

    $('#link-registro, #sidebar-link-registro').click(function(e) {
        e.preventDefault();
        loadContent("pages/registro.html", function() {
            // Inicializar CRUD después de cargar la página de registro
            initializeCrud();
        });
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });

    // Inicializar CRUD después de cargar la página de registro
    function initializeCrud() {
        var patients = [];

        $('#patientForm').on('submit', function(e) {
            e.preventDefault();
            var name = $('#patientName').val();
            var firstSurname = $('#patientFirstSurname').val();
            var secondSurname = $('#patientSecondSurname').val();
            var birthdate = $('#patientBirthdate').val();
            var gender = $('#patientGender').val();
            var identity = $('#patientIdentity').val();

            var patient = {
                name: name,
                firstSurname: firstSurname,
                secondSurname: secondSurname,
                birthdate: birthdate,
                gender: gender,
                identity: identity
            };

            patients.push(patient);
            renderTable();
            $('#patientForm')[0].reset();
        });

        function renderTable() {
            var tbody = $('#patientsTable tbody');
            tbody.empty();
            patients.forEach(function(patient, index) {
                var tr = $('<tr>');
                tr.append('<td>' + patient.name + '</td>');
                tr.append('<td>' + patient.firstSurname + '</td>');
                tr.append('<td>' + patient.secondSurname + '</td>');
                tr.append('<td>' + patient.birthdate + '</td>');
                tr.append('<td>' + patient.gender + '</td>');
                tr.append('<td>' + patient.identity + '</td>');
                tr.append('<td><button class="btn btn-warning btn-sm edit-patient" data-index="' + index + '">Editar</button> <button class="btn btn-danger btn-sm delete-patient" data-index="' + index + '">Eliminar</button> <button class="btn btn-info btn-sm monitor-patient" data-index="' + index + '">Iniciar Monitoreo</button></td>');
                tbody.append(tr);
            });
        }

        $(document).on('click', '.delete-patient', function() {
            var index = $(this).data('index');
            patients.splice(index, 1);
            renderTable();
        });

        $(document).on('click', '.edit-patient', function() {
            var index = $(this).data('index');
            var patient = patients[index];
            $('#patientName').val(patient.name);
            $('#patientFirstSurname').val(patient.firstSurname);
            $('#patientSecondSurname').val(patient.secondSurname);
            $('#patientBirthdate').val(patient.birthdate);
            $('#patientGender').val(patient.gender);
            $('#patientIdentity').val(patient.identity);
            patients.splice(index, 1);
            renderTable();
        });

        $(document).on('click', '.monitor-patient', function() {
            loadContent("pages/monitoreo.html");
            $('.nav-link').removeClass('active');
            $('#link-monitoreo, #sidebar-link-monitoreo').addClass('active');
        });
    }

    // Llamar a initializeCrud si ya estamos en la página de registro al cargar la página
    if ($('#content').find('#patientsTable').length > 0) {
        initializeCrud();
    }
});