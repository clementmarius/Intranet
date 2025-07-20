<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/routes/api.php';
require_once __DIR__ . '/../src/controllers/TicketsController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/ticket-liste':
        $controller = new TicketsController();
        $controller->liste();
        break;

    case '/ticket-detail':
        $controller = new TicketsController();
        $controller->detail();
        break;

    default:
        http_response_code(404);
        echo "Page non trouvee.";
}
