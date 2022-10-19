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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('contact', 'Home::contact');

$routes->group('auth',['namespace'=>'App\Controllers\Auth'],function($routes){
    $routes->get('register','Register::index',['as'=>'register']);
    $routes->post('store','Register::store');
    $routes->get('login','Login::index',['as'=>'login']);
    $routes->post('check','Login::signin',['as'=>'signin']);
    $routes->get('logout', 'Login::signout',['as'=>'signout']);
});


$routes->group('admin',['namespace' => 'App\Controllers\admin','filter'=>'auth:admin'],function($routes){
    //Dashboard
    $routes->get('dashboard','Dashboard::index');

    // Students
    $routes->get('students','Student::index');
    $routes->get('add_student','Student::add');
    $routes->post('store_student','Student::store');
    $routes->get('edit_student/(:num)','Student::edit/$1');
    $routes->post('update_student','Student::update');
    
    // Instructors
    $routes->get('instructors','Instructor::index');
    $routes->get('add_instructor','Instructor::add');
    $routes->post('store_instructor','Instructor::store');
    $routes->get('edit_instructor/(:num)','Instructor::edit/$1');
    $routes->post('update_instructor','Instructor::update');
    
    // courses
    $routes->get('courses','Course::index');
    $routes->get('add_course','Course::add');
    $routes->post('store_course','Course::store');
    $routes->get('edit_course/(:num)','Course::edit/$1');
    $routes->get('certificates_course/(:num)','Course::certificatesCourse/$1');
    $routes->post('update_course','Course::update');
    $routes->post('delete_course','Course::delete');
    // certificateTemplate
    $routes->get('course_certificate/(:num)','Course::courseCertificate/$1');
    $routes->post('store_course_certificate','Course::updateCertificateTemplate');
    
    //Users
    //Categories
    $routes->get('categories','Categories::index');
    $routes->get('add_category','Categories::add');
    $routes->post('store_category','Categories::store');
    $routes->get('edit_category/(:num)','Categories::edit/$1');
    $routes->get('certificates_category/(:num)','Categories::certificatesCourse/$1');
    $routes->post('update_category','Categories::update');
    $routes->post('delete_category','Categories::delete');

    //Certificate Cast
    $routes->get('casts','Cast::index');
    $routes->get('add_category','Categories::add');
    $routes->post('store_category','Categories::store');
    $routes->get('edit_category/(:num)','Categories::edit/$1');
    $routes->get('certificates_category/(:num)','Categories::certificatesCourse/$1');
    $routes->post('update_category','Categories::update');
    $routes->post('delete_category','Categories::delete');





    //CertificateType
    $routes->get('certificates-types','CertificateType::index');
    $routes->post('add_type_description','CertificateType::add');
    $routes->post('get_type_description','CertificateType::getCertificateType');
    $routes->post('save_certificatetype','CertificateType::update');
    
    //CertificateTemplate
    $routes->get('certificates-template','CertificateTemplate::index');
    $routes->get('add_certificate_template','CertificateTemplate::add');
    
    //CertificateTemplate

    $routes->get('models','Course::index');
    $routes->get('add_course','Course::add');
    $routes->post('store_course','Course::store');
    $routes->get('edit_course/(:num)','Course::edit/$1');
    $routes->get('certificates_course/(:num)','Course::certificatesCourse/$1');
    $routes->post('update_course','Course::update');
    $routes->post('delete_course','Course::delete');
});

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
