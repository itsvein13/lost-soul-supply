<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/collection', 'Home::collection');
$routes->get('/about', 'Home::about');
$routes->get('/contact', 'Home::contact');
$routes->get('/product/(:num)', 'Home::product/$1');  // detail produk by id
$routes->get('/cart', 'Cart::index');
$routes->post('/cart/add', 'Cart::add');
$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');
$routes->get('/checkout', 'Checkout::index');
$routes->post('/checkout/process', 'Checkout::process');
$routes->get('/checkout/success/(:num)', 'Checkout::success/$1');
// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login/process', 'Auth::loginProcess');
$routes->get('/register', 'Auth::register');
$routes->post('/register/process', 'Auth::registerProcess');
$routes->get('/logout', 'Auth::logout');
$routes->get('/forgot-password', 'Auth::forgotPassword');
$routes->post('/forgot-password/process', 'Auth::forgotPasswordProcess');
$routes->get('/forgot-password/sent', 'Auth::forgotPasswordSent');
$routes->get('/reset-password/(:segment)', 'Auth::resetPassword/$1');
$routes->post('/reset-password/process', 'Auth::resetPasswordProcess');
// Admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/orders', 'Admin::orders');
$routes->get('/admin/orders/(:num)', 'Admin::orderDetail/$1');
$routes->post('/admin/orders/(:num)/status', 'Admin::updateOrderStatus/$1');
$routes->get('/admin/products', 'Admin::products');
$routes->get('/admin/products/create', 'Admin::productCreate');
$routes->post('/admin/products/store', 'Admin::productStore');
$routes->get('/admin/products/edit/(:num)', 'Admin::productEdit/$1');
$routes->post('/admin/products/update/(:num)', 'Admin::productUpdate/$1');
$routes->get('/admin/products/delete/(:num)', 'Admin::productDelete/$1');
$routes->get('/admin/users', 'Admin::users');
