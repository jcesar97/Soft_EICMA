<?php

namespace Config;

use App\Controllers\Nom_Departamentos;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


$routes->post('Nom_Departamentos/add_Dep', 'Nom_Departamentos::add_Dep');
$routes->get('Nom_Departamentos/edit/(:num)', 'Nom_Departamentos::edit/$1');
$routes->post('Nom_Departamentos/update/(:num)', 'Nom_Departamentos::update/$1');
$routes->post('Nom_Departamentos/delete/(:num)', 'Nom_Departamentos::delete/$1');

$routes->post('Nom_Clientes/add', 'Nom_Clientes::add');
$routes->get('Nom_Clientes/edit/(:num)', 'Nom_Clientes::edit/$1');
$routes->post('Nom_Clientes/update/(:num)', 'Nom_Clientes::update/$1');
$routes->post('Nom_Clientes/delete/(:num)', 'Nom_Clientes::delete/$1');

$routes->post('Nom_Estados/add', 'Nom_Estados::add');
$routes->get('Nom_Estados/edit/(:num)', 'Nom_Estados::edit/$1');
$routes->post('Nom_Estados/update/(:num)', 'Nom_Estados::update/$1');
$routes->post('Nom_Estados/delete/(:num)', 'Nom_Estados::delete/$1');

$routes->post('Nom_Frecuencia/add', 'Nom_Frecuencia::add');
$routes->get('Nom_Frecuencia/edit/(:num)', 'Nom_Frecuencia::edit/$1');
$routes->post('Nom_Frecuencia/update/(:num)', 'Nom_Frecuencia::update/$1');
$routes->post('Nom_Frecuencia/delete/(:num)', 'Nom_Frecuencia::delete/$1');

$routes->post('Nom_Moneda/add', 'Nom_Moneda::add');
$routes->get('Nom_Moneda/edit/(:num)', 'Nom_Moneda::edit/$1');
$routes->post('Nom_Moneda/update/(:num)', 'Nom_Moneda::update/$1');
$routes->post('Nom_Moneda/delete/(:num)', 'Nom_Moneda::delete/$1');

$routes->post('Nom_Servicios/add', 'Nom_Servicios::add');
$routes->get('Nom_Servicios/edit/(:num)', 'Nom_Servicios::edit/$1');
$routes->post('Nom_Servicios/update/(:num)', 'Nom_Servicios::update/$1');
$routes->post('Nom_Servicios/delete/(:num)', 'Nom_Servicios::delete/$1');

$routes->post('Nom_Precio_serv/add', 'Nom_Precio_serv::add');
$routes->get('Nom_Precio_serv/edit/(:num)', 'Nom_Precio_serv::edit/$1');
$routes->post('Nom_Precio_serv/update/(:num)', 'Nom_Precio_serv::update/$1');
$routes->post('Nom_Precio_serv/delete/(:num)', 'Nom_Precio_serv::delete/$1');

$routes->post('Nom_Tecnicos/add', 'Nom_Tecnicos::add');
$routes->get('Nom_Tecnicos/edit/(:num)', 'Nom_Tecnicos::edit/$1');
$routes->post('Nom_Tecnicos/update/(:num)', 'Nom_Tecnicos::update/$1');
$routes->post('Nom_Tecnicos/delete/(:num)', 'Nom_Tecnicos::delete/$1');

$routes->post('Nom_Uni_medida/add', 'Nom_Uni_medida::add');
$routes->get('Nom_Uni_medida/edit/(:num)', 'Nom_Uni_medida::edit/$1');
$routes->post('Nom_Uni_medida/update/(:num)', 'Nom_Uni_medida::update/$1');
$routes->post('Nom_Uni_medida/delete/(:num)', 'Nom_Uni_medida::delete/$1');

$routes->post('Reportes/add', 'Reportes::add');
$routes->get('Reportes/edit/(:num)', 'Reportes::edit/$1');
$routes->post('Reportes/update/(:num)', 'Reportes::update/$1');
$routes->post('Reportes/cancelar/(:num)', 'Reportes::cancelar/$1');
$routes->post('Reportes/delete/(:num)', 'Reportes::delete/$1');
$routes->get('Reportes/asig_tecnico/(:num)', 'Reportes::asig_tecnico/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
