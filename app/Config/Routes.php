<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;

/**
 * @var RouteCollection $routes
 */
$routes->get('skl', [Home::class, 'index']);
$routes->post('skl', [Home::class, 'index']);
$routes->get('cetak-skl/(:num)', [Home::class, 'cetakSkl']);
$routes->post('update-skl', [Home::class, 'update']);
