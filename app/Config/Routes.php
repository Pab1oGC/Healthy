<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/insertarPacientes', 'Paciente::registerPatient');
$routes->get('/monitorear', 'Home::monitoreo');
$routes->get('/registrar', 'Home::registro');
$routes->get('eliminar/(:num)', 'Paciente::deletePatient/$1');
$routes->get('enviarId/(:num)', 'Paciente::recibirDatos/$1');
$routes->get('/fetchData', 'Paciente::fetchData');
$routes->get('/parar', 'Paciente::pararMonitoreo');

