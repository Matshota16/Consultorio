<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//index
$routes->get('/usuario','Usuario::index');
$routes->get('/paciente','Paciente::index');
$routes->get('/doctor','Doctor::index');
$routes->get('/consultorio','Consultorio::index');
$routes->get('/direccion','Direccion::index');
$routes->get('/cita','Cita::index');
$routes->get('/cita/home','Cita::home');


$routes->get('/usuario/salir','Usuario::salir');

$routes->post('/usuario/acceder','Usuario::acceder');

$routes->get('acceso-denegado', 'Usuario::accesoDenegado');

//add
$routes->get('/paciente/add','Paciente::add');
$routes->get('/doctor/add','Doctor::add');
$routes->get('/consultorio/add','Consultorio::add');
$routes->get('/direccion/add','Direccion::add');
$routes->get('/direccion/add1','Direccion::add1');
$routes->get('/direccion/add2','Direccion::add2');
$routes->get('/cita/add','Cita::add');
//insert
$routes->post('/paciente/insert','Paciente::insert');
$routes->post('/doctor/insert','Doctor::insert');
$routes->post('/consultorio/insert','Consultorio::insert');
$routes->post('/direccion/insert','Direccion::insert');
$routes->post('/direccion/insert1','Direccion::insert1');
$routes->post('/direccion/insert2','Direccion::insert2');
$routes->post('/cita/insert','Cita::insert');
//edit
$routes->get('/paciente/edit/(:num)','Paciente::edit/$1');
$routes->get('/doctor/edit/(:num)','Doctor::edit/$1');
$routes->get('/consultorio/edit/(:num)','Consultorio::edit/$1');
$routes->get('/direccion/edit/(:num)','Direccion::edit/$1');
$routes->get('/cita/edit/(:num)','Cita::edit/$1');
//update
$routes->post('/paciente/update','Paciente::update');
$routes->post('/doctor/update','Doctor::update');
$routes->post('/consultorio/update','Consultorio::update');
$routes->post('/direccion/update','Direccion::update');
$routes->post('/cita/update','Cita::update');
//delete
$routes->get('/categoria/delete/(:num)','Categoria::delete/$1');
$routes->get('/paciente/delete/(:num)','Paciente::delete/$1');
$routes->get('/doctor/delete/(:num)','Doctor::delete/$1');
$routes->get('/consultorio/delete/(:num)','Consultorio::delete/$1');
$routes->get('/direccion/delete/(:num)','Direccion::delete/$1');
$routes->get('/cita/delete/(:num)','Cita::delete/$1');


//añadir imagenes
$routes->get('/', 'Home::index');

$routes->get('upload', 'Upload::index');          // Add this line.
$routes->post('upload/upload', 'Upload::upload'); // Add this line.
$routes->get('upload/viewFiles', 'Upload::viewFiles');
$routes->get('upload/getFile/(:num)', 'Upload::getFile/$1');


//rutas clientes.

$routes->get('/cliente','Consultorio::Ver');
$routes->get('/Cliente/verConsultorio/(:num)','Consultorio::verConsultorio/$1');
