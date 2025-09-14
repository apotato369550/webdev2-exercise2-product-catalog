<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Product Catalog Routes
$routes->get('products', 'Products::index');
$routes->get('products/create', 'Products::create');
$routes->post('products/store', 'Products::store');
$routes->delete('products/delete/(:num)', 'Products::delete/$1');
