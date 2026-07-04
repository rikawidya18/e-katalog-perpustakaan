<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==============================
// FILTER ADMIN & PETUGAS
// ==============================
$routes->group('Admin', ['filter' => 'filteruser'], function ($routes) {
    $routes->get('/', 'Admin::index');
});

// ==============================
// FILTER PENGUNJUNG
// ==============================
$routes->group('DashboardPengunjung', ['filter' => 'filterpengunjung'], function ($routes) {
    $routes->get('/', 'DashboardPengunjung::index');
});