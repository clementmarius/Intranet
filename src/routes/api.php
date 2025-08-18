<?php

namespace ACCK\routes;

require_once __DIR__ . '/../controllers/TicketsController.php';
require_once __DIR__ . '/../controllers/ProjetController.php';
require_once __DIR__ . '/../controllers/ClientController.php';

use ACCK\controllers\TicketsController;
use ACCK\controllers\ProjetController;
use ACCK\controllers\ClientController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = '/api';

if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
    if ($uri === '' || $uri === false) {
        $uri = '/';
    }
}

// =================== TICKETS ===================
$controller = new TicketsController();

if ($uri === '/tickets') {
    $controller->liste();
} elseif ($uri === '/ticket-liste') {
    $controller->liste();
} elseif ($uri === '/ticket-creer') {
    $controller->create();
} elseif (preg_match('#^/ticket/(\d+)$#', $uri, $matches)) {
    $controller->detail($matches[1]);
} elseif (preg_match('#^/ticket-update/(\d+)$#', $uri, $matches)) {
    $controller->update($matches[1]);
} elseif ($uri === '/tickets/filter' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->filter();

    // =================== PROJETS ===================
} elseif ($uri === '/projets') {
    $controller = new ProjetController();
    $controller->liste();
} elseif ($uri === '/projet-creer') {
    $controller = new ProjetController();
    $controller->create();
} elseif (preg_match('#^/projet-update/(\d+)$#', $uri, $matches)) {
    $controller = new ProjetController();
    $controller->update($matches[1]);

    // =================== CLIENTS ===================
} elseif ($uri === '/clients') {
    $controller = new ClientController();
    $controller->liste();
} elseif ($uri === '/client-creer') {
    $controller = new ClientController();
    $controller->create();
} elseif (preg_match('#^/client-update/(\d+)$#', $uri, $matches)) {
    $controller = new ClientController();
    $controller->update($matches[1]);

    // =================== HOME ===================
} elseif ($uri === '/' || $uri === '') {
    include __DIR__ . '/../views/home.php';
} else {
    http_response_code(404);
    echo "Page non trouvée.";
}
