<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Contact;
use App\Exceptions\ContactException;
use App\DataTransferObjects\ContactFormData;
use App\Core\Response;

class HomeController
{
    public function index(): void
    {
        $views = [
            [
                'title' => 'Formulaire de Contact',
                'description' => 'Creez un programme PHP qui permet de creer un formulaire de contact et de traiter les donnees envoyees',
                'url' => '/contact',
                'icon' => '📧'
            ],
            [
                'title' => 'Affichage Tableau',
                'description' => 'Ecrivez un programme PHP qui permet de creer un tableau avec les donnees et de les afficher',
                'url' => '/array-display',
                'icon' => '📊'
            ],
            [
                'title' => 'Date et Heure actuelle',
                'description' => 'Creez un script PHP qui affiche la date et l\'heure actuelle',
                'url' => '/show-hours',
                'icon' => '🕒'
            ]
        ];

        require_once __DIR__ . '/../Views/home/index.php';
    }

    public function showHour(): void
    {
        require_once __DIR__ . '/../Views/home/showHours.php';
    }

    public function showArrayDisplay(): void
    {
        require_once __DIR__ . '/../Views/home/arrayDisplay.php';
    }
} 