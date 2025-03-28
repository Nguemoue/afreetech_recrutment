<?php

use App\Controllers\HomeController;
use App\Controllers\ContactController;
use App\Core\Router;

$router = new Router();

// Route d'accueil
$router->get('/', [HomeController::class, 'index']);

// Routes pour le formulaire de contact
$router->get('/contact', [ContactController::class, 'showForm']);
$router->post('/contact/submit', [ContactController::class, 'submitForm']);

// Routes pour l'affichage du tableau
$router->get('/array-display', [HomeController::class, 'showArrayDisplay']);

// Route pour l'affichage de l'heure
$router->get('/show-hours', [HomeController::class, 'showHour']);

return $router; 