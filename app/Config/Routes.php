<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


/** AUTH */
$routes->post('api/login-admin', 'AuthController::loginAdmin');

/** ADMIN */
$routes->post('api/create-employee', 'AdminController::createEmployee');
$routes->put('api/edit-employee/(:num)', 'AdminController::editEmployee/$1');
$routes->put('api/change-employee-status/(:num)', 'AdminController::changeEmployeeStatus/$1');
$routes->delete('api/delete-employee/(:num)', 'AdminController::deleteEmployee/$1');
$routes->post('api/upload-image/(:num)', 'AdminController::uploadImage/$1');

/** EMPLOYEE */
$routes->get('api/employee-list', 'EmployeeController::employeeList');
$routes->get('api/employee-detail/(:num)', 'EmployeeController::show/$1');

/** USER */
$routes->get('api/user-list', 'UserController::userList');

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
