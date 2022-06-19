<?php

namespace Config;

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

/**** GABUNG ****/
$routes->get('/', 'user::index', ['filter' => 'role:admin,guru,mgmp']);
$routes->add('soal/(:any)', 'soal::$1',  ['filter' => 'role:admin,guru,mgmp']);
$routes->add('user/edit_akun_user', 'user::edit_akun_user/$1',  ['filter' => 'role:admin,guru']);
$routes->add('user/simpan_edit_akun_user', 'user::simpan_edit_akun_user/$1',  ['filter' => 'role:admin,guru']);

/**** ADMIN ****/
$routes->add('guru/(:any)', 'guru::$1',  ['filter' => 'role:admin']);
$routes->add('mapel/(:any)', 'mapel::$1',  ['filter' => 'role:admin']);
$routes->add('sekolah/(:any)', 'sekolah::$1',  ['filter' => 'role:admin']);
$routes->add('user/daftar_akun', 'user::daftar_akun',  ['filter' => 'role:admin']);
$routes->add('user/edit_akun/(:any)', 'user::edit_akun/$1',  ['filter' => 'role:admin']);
$routes->add('user/simpan_edit_akun/(:any)', 'user::simpan_edit_akun/$1',  ['filter' => 'role:admin']);
// $routes->add('user/simpan_edit_akun', 'user::simpan_edit_akun',  ['filter' => 'role:admin']);


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