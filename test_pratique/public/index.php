<?php

declare(strict_types=1);

use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

// Récupérer la méthode HTTP et le chemin
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';

// Charger les routes
$router = require_once __DIR__ . '/../app/routes.php';

// Dispatcher la requête
$router->dispatch($method, $path); 