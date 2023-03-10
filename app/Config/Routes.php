<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('Login', 'Login::index');
$routes->get('Aufgaben', 'Aufgaben::index');
$routes->get('Aktuelle_Projekte', 'Aktuelle_Projekte::index');
$routes->get('Projekte', 'Projekte::index');
$routes->get('Mitglieder', 'Mitglieder::index');
$routes->get('Reiter', 'Reiter::index');
$routes->get('Logout', 'Login::logout');
$routes->get('Aufgaben/submit_edit', 'Aufgaben::submit_edit');

//Login
$routes->post('Login', 'Login::index');


//Mitglieder
$routes->post('mitglieder/submit_edit', 'Mitglieder::submit_edit');
$routes->post('mitglieder/mitglieder/submit_edit', 'Mitglieder::submit_edit');
$routes->post('mitglieder/loeschenbestaetigen', 'Mitglieder::loeschenbestaetigen');
$routes->post('Mitglieder', 'Mitglieder::index');

//Projekte
$routes->post('Projekte', 'Projekte::index');
$routes->post('Projekte/submit_edit', 'Projekte::submit_edit');
$routes->post('Projekte/Projekte/submit_edit', 'Projekte::submit_edit');

//Reiter
$routes->post('Reiter/submit_edit', 'Reiter::submit_edit');
$routes->post('Reiter/Reiter/submit_edit', 'Reiter::submit_edit');
$routes->post('Reiter/loeschenbestaetigen', 'Reiter::loeschenbestaetigen');
$routes->post('Reiter', 'Reiter::index');

//Aufgaben
$routes->post('Aufgaben/submit_edit', 'Aufgaben::submit_edit');
$routes->post('Aufgaben/Aufgaben/submit_edit', 'Aufgaben::submit_edit');
$routes->post('Aufgaben', 'Aufgaben::index');
$routes->post('Aufgaben/loeschen', 'Aufgaben::loeschen');






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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
