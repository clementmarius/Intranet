<?php

namespace ACCK\routes;

require_once __DIR__ . '/../controllers/TicketsController.php';

use ACCK\controllers\TicketsController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$basePath = '/api';


if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
    //echo "Après suppression basePath, uri = '$uri'<br>";
    if ($uri === '' || $uri === false) {
        $uri = '/';
    }
}

//echo "Final uri = '$uri'<br>";

$controller = new TicketsController();

/* if ($uri === '/tickets') {
    $controller->liste();
} elseif ($uri === '/ticket-creer') {
    $controller->create();
} elseif (preg_match('#^/ticket/(\d+)$#', $uri, $matches)) {
    $controller->detail($matches[1]);
} elseif (preg_match('#^/ticket-update/(\d+)$#', $uri, $matches)) {
    $controller->update($matches[1]);
} elseif ($uri === '/' || $uri === '') {
    include __DIR__ . '/../views/home.php';
} else {
    http_response_code(404);
    echo "Page non trouvée.";
} */


if ($uri === '/tickets') {
    $controller->liste();
} elseif ($uri === '/ticket-liste') {
    $controller->liste(); // Ajouté pour afficher la page ticket-liste.php via MVC
} elseif ($uri === '/ticket-creer') {
    $controller->create();
} elseif (preg_match('#^/ticket/(\d+)$#', $uri, $matches)) {
    $controller->detail($matches[1]);
} elseif (preg_match('#^/ticket-update/(\d+)$#', $uri, $matches)) {
    $controller->update($matches[1]);
} elseif ($uri === '/' || $uri === '') {
    include __DIR__ . '/../views/home.php';
} else {
    http_response_code(404);
    echo "Page non trouvée.";
}
