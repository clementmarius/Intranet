<?php

require_once __DIR__ . '/../controllers/TicketsController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$controller = new TicketsController();

// Routing
if ($uri === '/tickets') {
    $controller->liste();
} elseif ($uri === '/ticket-creer') {
    $controller->create();
} elseif (preg_match('#^/ticket/(\d+)$#', $uri, $matches)) {
    $controller->detail($matches[1]);
} elseif (preg_match('#^/ticket-update/(\d+)$#', $uri, $matches)) {
    $controller->update($matches[1]);
} else {
    http_response_code(404);
    echo "Page non trouvée.";
}
