<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::principal');
$routes->get('/acerca_de', 'Home::acerca_de');
$routes->get('/login', 'Home::login');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/registro', 'Home::registro');
$routes->get('/principal', 'Home::principal');
$routes->get('/listado_usuario', 'Usuario_controller::listado_usuario',['filter'=>'auth']);
$routes->get('/lista_usuario', 'Usuario_controller::listado_usuario',['filter'=>'auth']);

#Para enviar el formulario al metodo
$routes->post('/enviar-form','Usuario_controller::formValidation');
$routes->post('/enviar-form_editado(:num)','Usuario_controller::editarUsuario/$1');

#Para enviar datos de login
$routes->post('/enviarlogin','Login_controller::auth');
$routes->get('/logout','Login_controller::logout');

#CRUD
$routes->get('/elimin_usuario_log(:num)', 'Usuario_controller::eliminarUsuarioLogico/$1',['filter'=>'auth']);
$routes->get('/editar_usuario(:num)', 'Usuario_controller::editarUsuario/$1',['filter'=>'auth']);
$routes->get('/devolverUsuarioLogico(:num)', 'Usuario_controller::devolverUsuarioLogico/$1',['filter'=>'auth']);
$routes->get('/editar_user', 'Usuario_controller::editarUser',['filter'=>'auth']);



