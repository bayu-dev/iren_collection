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
$routes->get('/', 'Home::index');


// /*
//  * --------------------------------------------------------------------
//  * Report
//  * --------------------------------------------------------------------
//  */

//akses Jurnal
$routes->get('/jurnal', 'Laporan/Jurnal::index', ['filter' => 'role:pemilik']);
$routes->get('/jurnal/index', 'Laporan/Jurnal::index', ['filter' => 'role:pemilik']);
$routes->post('/jurnal/(:any)', 'Laporan/Jurnal::show_data_jurnal', ['filter' => 'role:pemilik']);

//akses Buku Besar
$routes->get('/bukuBesar', 'Laporan/BukuBesar::index', ['filter' => 'role:pemilik']);
$routes->get('/bukuBesar/index', 'Laporan/BukuBesar::index', ['filter' => 'role:pemilik']);
$routes->post('/bukuBesar/(:any)', 'Laporan/BukuBesar::show_data_buku_besar', ['filter' => 'role:pemilik']);

//akses Kartu Stok
$routes->get('/kartuStok', 'Laporan/KartuStok::index', ['filter' => 'role:pemilik']);
$routes->get('/kartuStok/index', 'Laporan/KartuStok::index', ['filter' => 'role:pemilik']);
$routes->post('/kartuStok/(:any)', 'Laporan/KartuStok::show_data_kartu_stok', ['filter' => 'role:pemilik']);



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
