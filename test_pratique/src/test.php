<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;

try {
    // Obtenir l'instance de la base de données
    $database = Database::getInstance();
    
    // Obtenir la connexion PDO
    $connection = $database->getConnection();
    
    // Tester la connexion avec une requête simple
    $result = $connection->query("SELECT 1");
    
    echo "Connexion à la base de données réussie !\n";
    
    // Afficher les informations de la connexion
    echo "Version du serveur MySQL : " . $connection->getAttribute(PDO::ATTR_SERVER_VERSION) . "\n";
    echo "Nom de la base de données : " . $connection->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
    
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage() . "\n";
} 